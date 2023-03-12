import './bootstrap';
import '../sass/app.scss';

import 'jquery-validation';

import jQuery from 'jquery';

window.$ = jQuery;

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const reviewForm = $('#reviewForm');

    if(reviewForm){
        reviewForm.validate({
            rules: {
                'review': {
                    required: true,
                    minlength: 5,
                }
            },
        });
    }

    const favButton = $('#favoriteButton');

    if(favButton)
    {
        favButton.on('click', function(e){
            e.preventDefault();
            const productID = $('#product_id').val();

            $.ajax({
                url: '/toggle-favorite/' + productID,
                method: 'POST',
                success:function (response){
                    favoriteAction(response)
                },
            })

            function favoriteAction(response)
            {
                let heart = $('#heart');

                if(response.message === 'created')
                {
                    heart.removeClass('bi-suit-heart');
                    heart.addClass('bi-suit-heart-filled');
                }

                if(response.message === 'deleted')
                {
                    heart.removeClass('bi-suit-heart-filled');
                    heart.addClass('bi-suit-heart');
                }
            }
        });

    }
});
