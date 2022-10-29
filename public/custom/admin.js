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

        $('#slider-photo').change(function(e){

            const photo_url = URL.createObjectURL(e.target.files[0]);
            $('#slider-photo-preview').attr('src',photo_url);
        });


        //add-new-btn-slider
        let btn_no = 1;
        $('#add-new-btn-slider').click(function(e){
            e.preventDefault();

            $('.slider-btn-otp').append(`
                <div class="btn-otp-area">
                <span>Button #${btn_no}</span>
                <input class="form-control" type="text" name = "btn_title[]" placeholder="Button Title">
                <input class="form-control" type="text" name = "btn_link[]" placeholder="Button Link">
                <select class="form-control" name="btn_type[]">
                    <option value="btn-light-out">default</option>
                    <option value="btn-color btn-full">Red</option>
                </select>
                </div>
            `)
            btn_no++;
        })

        //Select Icon

        $('button.show-icon').click(function(e){
            e.preventDefault();
            $('#select-icon').modal('show');
        })

        //Select Icon

        $('.select-icon-modal .preview-icon code').click(function(){

            let icon_name = $(this).html();
            $('.select-icon-show').val(icon_name);
            $('#select-icon').modal('hide');
        })

        //Gallery
        $('#gallery-photo').change(function(e){
            const files = e.target.files;
            let gallery_ui = '';

            for (let i = 0; i < files.length; i++) {
               const obj_url = URL.createObjectURL(files[i]);
                gallery_ui += `<img src= "${ obj_url }">`;
            }

            $('.port-gall').append(gallery_ui);


        });

            ClassicEditor
                .create( document.querySelector( '#posteditor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
            
            
        $('.comet-select-2').select2();

    });
})(jQuery)