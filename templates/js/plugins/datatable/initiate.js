(function($){
    'use strict'
	$(document).ready(function(){
        $('#datatable1').DataTable({            
            language: { 
                search              : "",
                searchPlaceholder : "Search Here...",
            },
            responsive: true,
        });
        $('div.dataTables_filter input').addClass('form-control');

        $('#datatable2').DataTable({            
            searching : false,
            responsive: true,
        });
	});
}(jQuery))