$(function(){
    alert("")
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('.nav-tabs a').click(function (e) {
      $(this).tab('show');
      var scrollmem = $('body').scrollTop();
      window.location.hash = this.hash;
      // $('html,body').scrollTop(scrollmem);
    });

    $('.select2').select2();

    $('.slimscrollsidebar').slimScroll({
      height: '200px'
  });

  });