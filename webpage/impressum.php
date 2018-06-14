<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Storm Pi</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="css/grid.css">
    <!--<![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/layout/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="css/layout/side-menu.css">
    <!--<![endif]-->

    <link rel="stylesheet"
          href="https://unpkg.com/purecss-components@0.0.12/dist/pure-components.css"
          integrity="sha384-3vxDvOU9lXU+bcgTkQNhnflfhRt/EFEGLtd3jQn8vQRGGQlpBX9VOq4oIufzLOO9"
          crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/css1.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>

    <script src="//code.simplesvg.com/1/1.0.0-beta5/simple-svg.min.js"></script>

    <script src="js/js1.js"></script>

</head>

<body>
<div class="">
    <pre>
<p>Impressum
    Informationspflicht laut §5 E-Commerce Gesetz, §14 Unternehmensgesetzbuch, §63 Gewerbeordnung und
    Offenlegungspflicht laut §25 Mediengesetz.

    Pascal Skupa

    Gemeindeweg 4-8, Haus 9 ,
    2201 Gerasdorf,
    Österreich

    E-Mail: pascal.skupa@htl.rennweg.at


    EU-Streitschlichtung
    Angaben zur Online-Streitbeilegung: Verbraucher haben die Möglichkeit, Beschwerden an die
    OnlineStreitbeilegungsplattform der EU zu richten:
    https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&lng=DE. Sie können allfällige Beschwerde
    auch an die oben angegebene E-Mail-Adresse richten.

    Haftung für Inhalte dieser Webseite
    Wir entwickeln die Inhalte dieser Webseite ständig weiter und bemühen uns korrekte und aktuelle Informationen
    bereitzustellen. Leider können wir keine Haftung für die Korrektheit aller Inhalte auf dieser Webseite übernehmen,
    speziell für jene die seitens Dritter bereitgestellt wird. Sollten Ihnen problematische oder rechtswidrige Inhalte
    auffallen, bitte wir Sie uns umgehend zu kontaktieren, Sie finden die Kontaktdaten im Impressum.

    Haftung für Links auf dieser Webseite
    Unsere Webseite enthält Links zu anderen Webseiten für deren Inhalt wir nicht verantwortlich sind. Wenn Ihnen
    rechtswidrige Links auf unserer Webseite auffallen, bitte wir Sie uns zu kontakieren, Sie finden die Kontaktdaten im
    Impressum.

    Urheberrechtshinweis
    Alle Inhalte dieser Webseite (Bilder, Fotos, Texte, Videos) unterliegen dem Urheberrecht. Falls notwendig, werden
    wir die unerlaubte Nutzung von Teilen der Inhalte unserer Seite rechtlich verfolgen.

    Bildernachweis
    Die Bilder, Fotos und Grafiken auf dieser Webseite sind urheberrechtlich geschützt.

    Die Bilderrechte liegen bei den folgenden Fotografen und Unternehmen:

    ...
    ...

    Datenschutzerklärung
    Datenschutz
    Wir haben diese Datenschutzerklärung verfasst, um Ihnen gemäß der Vorgaben der EU-Datenschutz-Grundverordnung zu
    erklären, welche Informationen wir sammeln, wie wir Daten verwenden und welche Entscheidungsmöglichkeiten Sie als
    Besucher dieser Webseite haben.

    Leider liegt es in der Natur der Sache, dass diese Erklärungen sehr technisch klingen, wir haben uns bei der
    Erstellung jedoch bemüht die wichtigsten Dinge so einfach und klar zu beschreiben.

    Ihre Rechte
    Ihnen stehen grundsätzlich die Rechte auf Auskunft, Berichtigung, Löschung, Einschränkung, Datenübertragbarkeit,
    Widerruf und Widerspruch zu. Wenn Sie glauben, dass die Verarbeitung Ihrer Daten gegen das Datenschutzrecht verstößt
    oder Ihre datenschutzrechtlichen Ansprüche sonst in einer Weise verletzt worden sind, können Sie sich bei der
    Aufsichtsbehörde beschweren. In Österreich ist dies die Datenschutzbehörde, deren Webseiten Sie unter
    https://www.dsb.gv.at/ finden.

    Google Analytics Datenschutzerklärung
    Wir verwenden auf dieser Webseite Google Analytics der Firma Google Inc. (1600 Amphitheatre Parkway Mountain View,
    CA 94043, USA) um Besucherdaten statistisch auszuwerten. Dabei verwendet Google Analytics zielorientierte Cookies.

    Nähere Informationen zu Nutzungsbedingungen und Datenschutz finden Sie unter
    http://www.google.com/analytics/terms/de.html bzw. unter https://support.google.com/analytics/answer/6004245?hl=de.

    Pseudonymisierung
    Unser Anliegen im Sinne der DSGVO ist die Verbesserung unseres Angebotes und unseres Webauftritts. Da uns die
    Privatsphäre unserer Nutzer wichtig ist, werden die Nutzerdaten pseudonymisiert. Die Datenverarbeitung erfolgt auf
    Basis der gesetzlichen Bestimmungen des § 96 Abs 3 TKG sowie des Art 6 EU-DSGVO Abs 1 lit a (Einwilligung) und/oder
    f (berechtigtes Interesse) der DSGVO.

    Deaktivierung der Datenerfassung durch Google Analytics
    Mithilfe des Browser-Add-ons zur Deaktivierung von Google Analytics-JavaScript (ga.js, analytics.js, dc.js) können
    Website-Besucher verhindern, dass Google Analytics ihre Daten verwendet.

    Sie können die Erfassung der durch das Cookie erzeugten und auf Ihre Nutzung der Website bezogenen Daten an Google
    sowie die Verarbeitung dieser Daten durch Google verhindern, indem Sie das unter dem folgenden Link verfügbare
    Browser-Plugin herunterladen und installieren: https://tools.google.com/dlpage/gaoptout?hl=de.
</p>
    </pre>
</div>
</body>
</html>