 window.alert = function() {};
 var defaultCSS = document.getElementById('bootstrap-css');

 function changeCSS(css) {
     if (css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
     else $('head > link').filter(':first').replaceWith(defaultCSS);
 }
 $(document).ready(function() {
     var iframe_height = parseInt($('html').height());
     window.parent.postMessage(iframe_height, 'http://bootsnipp.com');
     loadTemplates(queries);
     loadCategory(queries);
 });
 var queries = {};
 $.each(document.location.search.substr(1).split('&'), function(c, q) {
     if (q != "") {
         var i = q.split('=');
         queries[i[0].toString()] = i[1].toString();
     }
 });

 
 /* function percentChange(x,y) {
   return ((y-x)/x)*100;
 }*/
 function percentChange(x, y) {
     return {
         "change": (((y - x) / x) * 100),
         "class": (y > x) ? "likes-up" : "likes-down"
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
         for (val in reply) {

             //console.log('reply -> ',val);
             var date = [],
                 i = 0;
             for (dates in reply[val]) {
                 date[i] = dates;
                 date.sort();
                 i++;

             }
             //  console.log('date => 1',date);
             if (count == 0) {
                 table += '<thead class="cf"><tr><th class="menu-right" data-sort="string-ins">Date </th>';
                 for (c in date) {
                     table += '<th class="numeric" data-sort="float">' + date[c] + '</th>';
                 }
                 table += '</tr></thead><tbody>';
             }

             table += '<tr>';
             table += '<td data-title="Page Name">' + val + '</td>';
             for (d in date) {
                 if (d != 0) {
                     var percent = percentChange(reply[val][date[0]], reply[val][date[d]]);
                     table += '<td data-title="' + date[d] + '" data-sort-value='+percent.change.toFixed(3)+'>' + reply[val][date[d]] + '<span class="' + percent.class + '">' + Math.abs(percent.change.toFixed(3)) + '% </td>';
                 } else
                     table += '<td data-title="' + date[d] + '">' + reply[val][date[d]] + '</td>';
                 //console.log('date => '+date[d]+'likes => '+reply[val][date[d]]);
             }
             /*                table += '<td data-title="" class="'+percent.class+'">'+ Math.abs(percent.change.toFixed(3))+' %</td>';*/

             table += '</tr>';
             if (count == (reply.length - 1)) {
                 table += '</tbody>';
             }
             count++;
         }
         //console.log('table => '+table);
         $('.fblikes-table').html(table);
         $('#no-more-tables , .pagination-container').show();
         $("table").stupidtable();
     }).fail(function(reply) {
         console.log("fail");
     });
 }

function loadCategory(params) {
    // $('#loader').html("<img src='assets/ajax-loader2.gif' />").show();
    // $('#no-more-tables , .pagination-container').hide();
    console.log("loadCategory");
    $.ajax({
        type: "GET",
        data: params,
        timeout: 5000,
        url: 'api/category.php',
    }).done(function(category) {
        console.log(loadCategory);
        //$('#loader').html("").hide();
        var data_category='';
        console.log('queries.category => '+queries.category);
        data_category+='<option value=" ">--Select category--</option>';
        if(queries.category == 'All' || queries.category == undefined)
            data_category+='<option selected>All</option>';
        else
            data_category+='<option selected>All</option>';
        for(cat in category)
        {
            if(decodeURIComponent(queries.category).replace("+", " ") == category[cat])
                data_category +='<option selected>';
            else    
                data_category +='<option>';
            data_category+=category[cat]+'</option>';
        }
        $('#category_form select.category-filter').html(data_category);
      
   }).fail(function(reply) {
        console.log("fail");
    });
}
