(function($){
    $(document).ready(function() {
        
        //delete btn alert
        $('.delete-form').submit(function(e){

            let conf =confirm('Are you Sure ?');

            if (conf) {
                return true;
            }else{
                e.preventDefault();
            }
        });

        $('.data-table-search').DataTable();
    });
})(jQuery)