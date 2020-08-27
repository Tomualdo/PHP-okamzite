(function(Md) {

var prevodnik = new Md.Converter();
var editor = new Md.Editor(prevodnik, null, {strings: Md.local.cs});
editor.run();

})(Markdown);