
$(function () {
    var nump = $('#nump').val();
    var numr = $('#numr').val();
    var room = $('#room').html();

    var price = $('.cli').eq(0).children().children().html();
    $('#all').html(parseInt(price) + parseInt(room));
    $('#room').html(numr*room);


    $('.type-list li:eq(0)').addClass('active');
    var t_id = $('.cli.active').attr('data-type');

    $('#p_type').val(t_id);
    //人数减
    $('#min').click(function () {
        var nump = $('#nump').val();
        var numr = $('#numr').val();
        var room = $('#room').html();
        var price = $('.active').children().children().html();
        this_nump = parseInt(nump) - 1;
        if(this_nump<= 1){
            this_nump = 1;
        }
        rooms = Math.floor(this_nump%2);
        numrs = Math.ceil(this_nump/2);
        /*
         if(numr>numrs){
         numrs=this_nump;
         }
         */
        roomc = (numrs*2-this_nump) * 300;
        $('#all').html(price*this_nump + roomc*1);
        room = $('#room').html(roomc);
        $('#nump').val(this_nump);
        $('#numr').val(numrs);

        if(rooms==0){
            $('#dis').hide();

        }else{

            $('#dis').show();
        }
    });
    //人数加
    $('#max').click(function () {

        var nump = $('#nump').val();
        var numr = $('#numr').val();
        var room = $('#room').html();
        var price = $('.active').children().children().html();
        this_nump = parseInt(nump) + 1;
        rooms = Math.floor(this_nump%2);
        numrs = Math.ceil(this_nump/2);
        roomc = (this_nump-numr*2) * 300;
        $('#all').html(price*this_nump + roomc*1);
        room = $('#room').html(roomc);
        $('#nump').val(this_nump);
        $('#numr').val(numrs);

        if(rooms==0){
            $('#dis').hide();

        }else{

            $('#dis').show();
        }
    });
    //房间减
    $('#rin').click(function () {


        var nump = $('#nump').val();
        var numr = $('#numr').val();
        var room = $('#room').html();
        numrs = Math.ceil(nump/2);
        this_numr=numr*1 - 1;


        if( this_numr < numrs ){
            this_numr=numrs;

            $('#tip').show(300).delay(3000).hide(300);
        }

        $('#numr').val(this_numr);
        all = $('#all').html(nump*price + (this_numr*2-nump)*300);
        roomc = (this_numr*2-nump) * 300;
        room = $('#room').html(roomc);

        if(this_numr*2-nump>0){

            $('#dis').show();
        }else{
            $('#dis').hide();
        }


    });
    //房间加
    $('#rax').click(function () {


        var nump = $('#nump').val();
        var numr = $('#numr').val();
        var room = $('#room').html();
        var price = $('.active').children().children().html();
        this_numr=numr*1 + 1;
        if( this_numr > nump ){
            this_numr=nump;
            $('#tp').show(300).delay(3000).hide(300);
            //setTimeout($('.num-tip').hide(),3000)
        }

        $('#numr').val(this_numr);
        roomc = (this_numr*2-nump) * 300;
        all = $('#all').html(nump*price + roomc*1);

        room = $('#room').html(roomc);

        if(this_numr*2-nump>0){

            $('#dis').show();
        }

    });

    $('.cli').click(function () {
        var price = $(this).children().children().html();
        $('.cli.active').removeClass('active');
        $(this).addClass('active');
        $('#all').html(price*1+300);
        var t_id = $('.cli.active').attr('data-type');
        $('#p_type').val(t_id);
        nump = $('#nump').val(1);
        numr = $('#numr').val(1);
    });
});