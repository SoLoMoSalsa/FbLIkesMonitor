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

 function percentChange(x, y) {
    var change = (((y - x) / x) * 100);
    if(change >= 0)
        var clas = "likes-up";
    else
        var clas = "likes-down";
     return {
         "change": change,
         "class": clas
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

         var date_array = [];
         date_array.push({
             "date": '2015-03-11',
             "value": "11 Mar '15"
         });
         date_array.push({
             "date": '2015-03-14',
             "value": "14 Mar '15"
         });
         date_array.push({
             "date": '2015-03-16',
             "value": "16 Mar '15"
         });
         date_array.push({
             "date": '2015-03-17',
             "value": "17 Mar '15"
         });
         date_array.push({
             "date": '2015-03-18',
             "value": "18 Mar '15"
         });
         table += '<thead class="cf"><tr><th class="menu-right sorting-asc" data-sort="string-ins">PAGES</th>';
         for (index in date_array) {
             table += '<th class="numeric" data-sort="float">' + date_array[index].value + '</th>';
         }
         table += '</tr></thead><tbody>';


         for (val in reply) {

             table += '<tr>';
             table += '<td data-title="Page Name">' + val + '</td>';
             var count = 0;
             for (d in date_array) {
                 var numberOfLikes = reply[val][date_array[d].date];

                 if (numberOfLikes == undefined)
                 {
                     numberOfLikes = "-N/A-";
                     table += '<td data-sort-value="0.0" data-title="' + date_array[d].value + '">' + numberOfLikes + '</td>';
                 }
                 else
                 { 
                    if(d!=0)
                    {
                        if(reply[val][date_array[d-1].date] == undefined)
                        {
                            table += '<td data-sort-value="0.0" data-title="' + date_array[d].value + '">' + numberOfLikes + '</td>';
                        }
                        else
                        {
                            if(count == 0)
                            {

                                var previous = reply[val][date_array[d-1].date];
/*                                console.log('val => '+val);
                                console.log('previous => '+previous);*/
                                count++;
                            }
                           
                            var percent = percentChange(previous, numberOfLikes);
                            if(val == 'Frooti'){
                                console.log('percentChange('+previous+', '+numberOfLikes+');',percent);
                            }
                            table += '<td data-title="' + date_array[d].value + '" data-sort-value=' + percent.change.toFixed(3) + '>' + numberOfLikes + '<span class="' + percent.class + '">' + Math.abs(percent.change.toFixed(3)) + '% </td>';  
                        }
                    }
                    else
                        table += '<td data-title="' + date_array[d].value + '"data-sort-value="'+numberOfLikes+'" >' + numberOfLikes + '</td>';
                 }
               
             }
             table += '</tr>';


         }
         table += '</tbody>';
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

     $.ajax({
         type: "GET",
         data: params,
         timeout: 5000,
         url: 'api/category.php',
     }).done(function(category) {
         console.log(loadCategory);
         //$('#loader').html("").hide();
         var data_category = '';
         console.log('queries.category => ' + queries.category);
         data_category += '<option value=" ">--Select category--</option>';
         if (queries.category == 'All' || queries.category == undefined)
             data_category += '<option selected>All</option>';
         else
             data_category += '<option selected>All</option>';
         for (cat in category) {
             if (decodeURIComponent(queries.category).replace("+", " ") == category[cat])
                 data_category += '<option selected>';
             else
                 data_category += '<option>';
             data_category += category[cat] + '</option>';
         }
         $('#category_form select.category-filter').html(data_category);

     }).fail(function(reply) {
         console.log("fail");
     });
 }
