/* Get HTML5 tags working in IE 8. */
document.createElement('header');
document.createElement('nav');
document.createElement('article');
document.createElement('aside');
document.createElement('footer');
document.createElement('section');
jQuery(document).ready(function($) {
 // Open external links in new window. Some people hate it (I do), but
 // this ends up being in all of our themes. -- LC
 var my_dom = window.location.hostname;
 if (my_dom.indexOf("www.") == 0) {
  my_dom = my_dom.substr(4);
 }
 $("a[href^='http://'],a[href^='https://']").each(function(){
  var this_dom = this.hostname;
  if (this_dom.indexOf("www.") == 0) {   
   this_dom = this_dom.substr(4);
  }
  if (this_dom != my_dom) {
   $(this).attr("target", "_blank");
  }
 });
});
