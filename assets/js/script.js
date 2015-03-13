var queries = {};
$.each(document.location.search.substr(1).split('&'), function(c, q) {
    if(q!="")
    {
        var i = q.split('=');
        queries[i[0].toString()] = i[1].toString();
}
});

loadTemplates(queries);

function loadTemplates(params) {
    $('#loader').html("<img src='" + window.base + "sites/all/themes/sealedair/assets/i/ajax-loader.gif' />").show();
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
                    console.log('date => '+date[d]+'likes => '+reply[val][date[d]]);
                }
                table +='</tr>';
            }
            $('.fblikes-table tbody').html(table)
    

        //var template = '<tr><td data-title="Page Name">{{username}}</td><td data-title="11Mar">50000</td><td data-title="12Mar" class="numeric">51000</td><td data-title="13Mar" class="numeric">52000</td><td data-title="14Mar" class="numeric">53000</td><td data-title="15Mar" class="numeric">153000</td><td data-title="16Mar" class="numeric">123456</td><td data-title="17Mar" class="numeric">736366</td><td data-title="18Mar" class="numeric">626243</td></tr>';

    }).fail(function(reply) {
        console.log("fail");
    });
}

