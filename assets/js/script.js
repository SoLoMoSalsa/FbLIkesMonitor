var queries = {};
$.each(document.location.search.substr(1).split('&'), function(c, q) {
    if(q!="")
    {
        var i = q.split('=');
        queries[i[0].toString()] = i[1].toString();
}
});

loadTemplates(queries);
/* function percentChange(x,y) {
  return ((y-x)/x)*100;
}*/
 function percentChange(x,y) {
 return {"change":(((y-x)/x)*100),
 "class":(y>x)?"likes-up":"likes-down"
 };
}
function loadTemplates(params) {
    $('#loader').html("<img src='assets/ajax-loader2.gif' />").show();
    $('#no-more-tables , .pagination-container').hide();
    //console.log("working");
    $.ajax({
        type: "GET",
        data: params,
        timeout: 5000,
        url: 'api',
    }).done(function(reply) {
        //console.log(reply);
        $('#loader').html("").hide();
        //window.location=reply;
        var table = '';
            //console.log(reply);
            var count = 0;
            for (val in reply){
                 
                //console.log('reply -> ',val);
                var date = [], i=0;
                for(dates in reply[val])
                {
                    date[i] = dates;
                     date.sort();
                    i++;

                }
              //  console.log('date => 1',date);
                if(count == 0)
                {
                    table += '<thead class="cf"><tr><th class="menu-right">Date </th>';
                    for(c in date)
                    {
                        table += '<th class="numeric">'+date[c]+'</th>';
                    }
                    table += '</tr></thead><tbody>';
                }

                table +='<tr>';
                table += '<td data-title="Page Name">'+val+'</td>';
                for(d in date)
                {
                    if( d!=0 )
                    {
                        var percent = percentChange(reply[val][date[d-1]],reply[val][date[d]]);
                        table += '<td data-title="'+date[d]+'">'+reply[val][date[d]]+'<span class="'+percent.class+'">'+ Math.abs(percent.change.toFixed(3))+'% </td>';
                    }
                    else
                        table += '<td data-title="'+date[d]+'">'+reply[val][date[d]]+'</td>';
                    //console.log('date => '+date[d]+'likes => '+reply[val][date[d]]);
                }              
/*                table += '<td data-title="" class="'+percent.class+'">'+ Math.abs(percent.change.toFixed(3))+' %</td>';*/

                table +='</tr>';
                if(count == (reply.length-1))
                {
                        table += '</tbody>';
                }
                count++;
            }
            //console.log('table => '+table);
            $('.fblikes-table').html(table);
                $('#no-more-tables , .pagination-container').show();    
   }).fail(function(reply) {
        console.log("fail");
    });
}

