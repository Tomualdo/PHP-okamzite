// Příklad:
//
// var mujEditor = new Markdown.Editor(mujPrevodnik, null,
//   {strings: Markdown.local.cs});

(function () {

Markdown.local = Markdown.local || {};
Markdown.local.cs = {
  bold: "Silný důraz <strong> Ctrl+B",
  boldexample: "silný důraz",

  italic: "Důraz <em> Ctrl+I",
  italicexample: "zdůrazněný text",

  link: "Odkaz <a> Ctrl+L",
  linkdescription: "text odkazu",
  linkdialog: "<p><b>Vložení hypertextového odkazu</b></p><p>http://priklad.cz/ \"volitelný title\"</p>",

  quote: "Citace <blockquote> Ctrl+Q",
  quoteexample: "citace",

  code: "Úryvek kódu <pre><code> Ctrl+K",
  codeexample: "úryvek kódu",

  image: "Obrázek <img> Ctrl+G",
  imagedescription: "popis obrázku",
  imagedialog: "<p><b>Vložení obrázku</b></p><p>http://priklad.cz/obrazky/diagram.jpg \"volitelný title\"<br><br><a href='http://www.google.com/search?q=free+image+hosting' target='_blank'>Potřebujete volně dostupný hosting obrázků?</a></p>",

  olist: "Uspořádaný seznam <ol> Ctrl+O",
  ulist: "Neuspořádaný seznam <ul> Ctrl+U",
  litem: "položka seznamu",

  heading: "Nadpis <h1>/<h2> Ctrl+H",
  headingexample: "Nadpis",

  hr: "Vodorovný oddělovač <hr> Ctrl+R",

  undo: "Zpět - Ctrl+Z",
  redo: "Znovu - Ctrl+Y",
  redomac: "Znovu - Ctrl+Shift+Z",

  help: "Nápověda"
};

})();