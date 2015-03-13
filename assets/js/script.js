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
    console.log("working");
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
            console.log(reply);
            for (val in reply){
                table +='<tr>';
                table += '<td data-title="Page Name">'+val+'</td>'; 
                //console.log('reply -> ',val);
                var date = [], i=0;
                for(dates in reply[val])
                {
                    date[i] = dates;
                     date.sort();
                    i++;

                }
                console.log('date => 1',date);
                for(d in date)
                {
                    table += '<td data-title="'+date[d]+'">'+reply[val][date[d]]+'</td>';
                    //console.log('date => '+date[d]+'likes => '+reply[val][date[d]]);
                }
                var percent = percentChange(reply[val][date[0]],reply[val][date[date.length-1]]);
                table += '<td data-title="" class="'+percent.class+'">'+percent.change.toPrecision(3)+' %</td>';

                table +='</tr>';
            }
            $('.fblikes-table tbody').html(table);
                $('#no-more-tables , .pagination-container').show();    
   }).fail(function(reply) {
        console.log("fail");
    });
}

