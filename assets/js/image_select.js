/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    if ($('.images_select').length !== 0) {
        $('.images_select').click(function (e) {
            e.preventDefault();
            console.log($('.images_select').attr('href'));
        });
    }
});