;(function($){
  
  /**
   * jQuery function to prevent default anchor event
   * and take the href * and the title to make a share popup
   *
   * @param  {[object]} e           [Mouse event]
   * @param  {[integer]} intWidth   [Popup width defalut 600]
   * @param  {[integer]} intHeight  [Popup height defalut 300]
   * @param  {[boolean]} blnResize  [Is popup resizeabel default false]
   */
  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {
    
    // Prevent default anchor event
    e.preventDefault();

    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
    
    // Set values for window
    intWidth = intWidth || '600';
    intHeight = intHeight || '300';
    strResize = (blnResize ? 'yes' : 'no');

    // Get top and left margins
    var left = ((width / 2) - (intWidth / 2)) + dualScreenLeft;
    var top = ((height / 2) - (intHeight / 2)) + dualScreenTop;

    // Set title and open popup with focus on it
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',top=' + top + ',left=' + left + ',resizable=' + strResize,            
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
  }
}(jQuery));

/* ================================================== */

;(function ($) {
    $(".share-button:not('.genericon-mail,.genericon-phone')").on("click", function(e) {
        $(this).customerPopup(e);
    });
}(jQuery));