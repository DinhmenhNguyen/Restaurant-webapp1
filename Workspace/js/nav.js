// ════════════════════════════════════════════════════
//  nav.js — Navigatie logica
//  Dit bestand regelt:
//    1. Het openen en sluiten van het hamburger menu
//    2. Het markeren van de actieve paginalink
// ════════════════════════════════════════════════════


// ── DEEL 1: HAMBURGER MENU ───────────────────────────

// 'const' betekent: maak een variabele aan die niet verandert.
// 'hamburger' is de naam die wij zelf kiezen voor deze variabele.
// 'document' is de volledige HTML-pagina.
// '.querySelector()' zoekt het EERSTE element met die CSS-klasse.
// '.header__hamburger' is de klasse op onze <button> in index.html.
// Resultaat: de variabele 'hamburger' bevat nu de <button>.
const hamburger = document.querySelector('.header__hamburger');

// Zelfde principe als hierboven.
// 'nav' bevat nu het <nav class="header__nav"> element uit index.html.
const nav = document.querySelector('.header__nav');

// 'if' betekent: voer de code binnen { } alleen uit ALS de voorwaarde klopt.
// 'hamburger' is hier de voorwaarde — als het element GEVONDEN is, is dit true.
// '&&' betekent: EN — beide dingen moeten true zijn.
// 'nav' — ook de nav moet gevonden zijn.
// Dit voorkomt een fout als dit script op een pagina zonder hamburger draait (bijv. bestel.html).
if (hamburger && nav) {

  // '.addEventListener()' zegt: "luister naar een actie op dit element."
  // 'hamburger' is het element waarop we luisteren.
  // Het eerste argument 'click' is het soort actie — een muisklik.
  // '() => { }' is een arrow function: de code die uitgevoerd wordt bij de klik.
  hamburger.addEventListener('click', () => {

    // 'nav.classList' is de lijst van CSS-klassen op het nav-element.
    // '.toggle()' werkt als een lichtschakelaar:
    //   - Staat de klasse er NIET op? Dan wordt hij TOEGEVOEGD.
    //   - Staat de klasse er WEL op?  Dan wordt hij VERWIJDERD.
    // 'header__nav--open' is de klasse die in index.css het menu zichtbaar maakt.
    // '.toggle()' geeft ook een waarde terug: true (toegevoegd) of false (verwijderd).
    // Die waarde slaan we op in de variabele 'isOpen'.
    const isOpen = nav.classList.toggle('header__nav--open');

    // '.setAttribute()' stelt een HTML-attribuut in op het element.
    // 'aria-expanded' is een speciaal attribuut voor toegankelijkheid (screenreaders).
    // Het vertelt blinde gebruikers of het menu open of dicht is.
    // 'isOpen' is true of false — dat wordt automatisch ingevuld.
    hamburger.setAttribute('aria-expanded', isOpen);

  // Sluit de addEventListener functie.
  });

// Sluit het if-blok.
}


// ── DEEL 2: ACTIEVE PAGINALINK MARKEREN ─────────────

// 'window' is het browservenster.
// 'window.location' bevat alle informatie over de huidige URL.
// 'window.location.pathname' is het pad in de URL, bijv: /Workspace/index.html
// '.split('/')' knipt de tekst op elke '/' en maakt er een lijst van:
//   [" ", "Workspace", "index.html"]
// '.pop()' pakt het LAATSTE item uit de lijst: "index.html"
// Resultaat: 'currentPage' bevat de bestandsnaam van de huidige pagina.
const currentPage = window.location.pathname.split('/').pop();

// 'document.querySelectorAll()' werkt als querySelector maar geeft ALLE gevonden elementen terug.
// '.header__nav-link' is de klasse die we op elke <a> in de nav hebben gezet.
// '.forEach()' loopt door elk gevonden element één voor één.
// 'link' is de naam die we tijdelijk geven aan elk element in de loop.
document.querySelectorAll('.header__nav-link').forEach(link => {

  // 'link.getAttribute('href')' leest de href-waarde van deze link, bijv: "bestel.html"
  // '.split('/').pop()' knipt en pakt de bestandsnaam — zelfde techniek als hierboven.
  // Resultaat: 'linkPage' bevat de bestandsnaam waar deze link naartoe gaat.
  const linkPage = link.getAttribute('href').split('/').pop();

  // '===' betekent: is precies gelijk aan (zowel waarde als type).
  // We vergelijken de bestandsnaam van de link met de huidige pagina.
  // Als ze overeenkomen, zijn we op de pagina waar deze link naartoe wijst.
  if (linkPage === currentPage) {

    // '.classList.add()' voegt een CSS-klasse toe aan het element.
    // 'active' is de klasse — in index.css geeft dit de link een oranje kleur.
    link.classList.add('active');

  // Sluit het if-blok.
  }

// Sluit de forEach loop.
});
