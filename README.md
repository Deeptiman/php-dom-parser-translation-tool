<h1 id="php-dom-parser-translation-tool">php-dom-parser-translation-tool</h1>
<p>This project was planned to demonstrate translation in live web pages by parsing through <strong>HTML DOM</strong> and extracting the text element and match them with an <strong>English to Odia</strong> dictionary that is stored in a local database. The complete parsing result will preview as a translated webpage for a website. </p>

<h1 id="teams">Teams</h1>
<ol>
<li><a href="https://github.com/anshumanpattnaik" target="_blank">Anshuman Pattnaik</a>  <a href="https://github.com/anshumanpattnaik" target="_blank">  <img src="https://img.shields.io/github/followers/anshumanpattnaik?style=social" alt="GitHub followers"> </a> <a href="https://twitter.com/anspattnaik" target="_blank"><img src="https://img.shields.io/twitter/follow/anspattnaik?style=social" alt="Twitter Follow"></a></li>
<li><a href="https://github.com/Deeptiman" target="_blank">Deeptiman Pattnaik</a>  <a href="https://github.com/Deeptiman" target="_blank">  <img src="https://img.shields.io/github/followers/Deeptiman?style=social" alt="GitHub followers"> </a> <a href="https://twitter.com/deeptimancode" target="_blank"><img src="https://img.shields.io/twitter/follow/deeptimancode?style=social" alt="Twitter Follow"></a></li>
</ol>


<h1 id="parsertool">ParserTool</h1>
<p>The tool will work to extract texts from a local directory that has collections of <strong>XML</strong> and <strong>HTML</strong> files. The tool will write the output in a text file line by line for each folder. The textual results will be useful to train in a <em>Statistical Machine Translation Engine</em> (<strong><a href="http://www.statmt.org/moses/">Moses</a></strong>) for translation accuracy purposes.</p>
<h2 id="-installation-"><strong>Installation</strong></h2>
<p>The project has been developed using <strong>PHP</strong>, <strong>HTML</strong>, <strong>MySQL</strong>. So, <strong>WampServer 2.0i</strong> has required to set up the Web Server environment in the local machine.</p>
<p><strong>Download WampServer 2.0i</strong>
   <a href="https://sourceforge.net/projects/wampserver/files/latest/download">https://sourceforge.net/projects/wampserver/files/latest/download</a>
</p>
<h2 id="-import-the-databases-"><strong>Import the databases</strong></h2>
<p>There are two different sets of the database for both the tools, so Go to &quot;<a href="http://localhost/phpmyadmin">http://localhost/phpmyadmin</a>&quot; and create &quot;<strong>odia_translate</strong>&quot;, &quot;<strong>dom_parser</strong>&quot; database in the phpMyAdmin panel. Then, import the corresponding SQLs that are available in this repo into the phpMyAdmin.</p>
<h2 id="-add-the-folders-"><strong>Add the folders</strong></h2>
<p>Now, place both &quot;<strong>_Odia<em>Translation</em></strong>&quot;, &quot;<strong><em>ParserTool</em></strong>&quot; folders at the installed Wamp Server location inside www folder.</p>
<h2 id="-run-the-application-"><strong>Run the application</strong></h2>
<p> <strong>Odia Translation</strong></p>
<ul>
   <li>Type &quot;<a href="http://localhost/Odia_Translation/">http://localhost/Odia_Translation/</a>&quot; in the browser and press Enter. You should see the following screenshot on the screen.</li>
   <img src="/screenshots/export_homepage_google_odia.png"/>
   <li>Users can type an URL to translate into the Odia language by pressing the &quot;<strong>Translate to ODIA</strong>&quot; button.</li>
   <img src="/screenshots/export_input_url_google_odia.png" />
</ul>
<ul>
   <li>
      <p>In this example- we have used &quot;<strong><em><a href="https://www.news18.com">https://www.news18.com</a></em></strong>&quot; to translate their home page but Users can use any &quot;URL&quot; to translate.</p>
   </li>
   <img src="/screenshots/export_news_eng.png" />   
   <li>
      <p>The first translate result will show the dom extraction table with <strong>Tag Name</strong> and translated <strong>Tag Value</strong>.</p>
   </li>
   <img src="/screenshots/export_translate_dom_table.png" />
   <li>Then the user can click on &quot;<strong><em>Click here to see the Translated Webpage</em></strong>&quot; button to the real translated webpage on the screen.</li>
   <img src="/screenshots/export_news_ori.png" />
</ul>
<p><strong>ParserTool</strong></p>
<ul>
   <li>Users can click on the &quot;<strong>HTML Parser Tool</strong>&quot; button from the application home page to use the ParserTool.</li>
   <img src="/screenshots/export_parser_tool_homepage.png" />
   <li>Enter the local directory path that has a large collection of <strong>HTML</strong> and <strong>XML</strong> files and press the &quot;<strong><em>Extract the Directory</em></strong>&quot; button.</li>
   <img src="/screenshots/export_parser_tool_extract.png"/>
   <li>The extracted text results are written to several &quot;<strong><em>Result-[num].txt</em></strong>&quot; files inside Result folder in ParserTool.</li>
</ul>
<h2 id="-how-does-it-work-"><strong>How does it work?</strong></h2>
<p>In the <strong>ParserTool,</strong> there is a section to understand the step by step process of extracting textual elements from each node in an <strong>HTML</strong> or <strong>XML</strong> file.</p>
<blockquote>
   <p>Browse any &quot;<em>HTML</em>&quot; or &quot;<em>XML</em>&quot; file from the local machine or use the
      sample &quot;_<strong><em>Html Basic.html</em></strong><em>&quot; file from this repo and upload it
      into the module.</em>
   </p>
</blockquote>
<p><strong>Step - 1</strong>
   The user can the parser table with <strong><em>Tag Name</em></strong> and <strong><em>Tag Value</em></strong> with the total count of tags in a separate view.
   <img src="/screenshots/export_step1.png" />
   <strong>Step - 2</strong>
   After clicking the &quot;<strong><em>Proceed To Step.2</em></strong>&quot; button, the user can see the possible number of lines that can be formed from the extracted texts.
   <img src="/screenshots/export_step2.png" />
   <strong>Step - 3</strong>
   Then, in the last step, the complete list of lines can be shown with the total number of lines count in a separate view.
   <img src="/screenshots/export_step3.png" />
</p>
<h2 id="important-php-apis">Important PHP APIs</h2>
<p>There are certain PHP APIs the application has used to analyze the DOM input and applied logic to provide Translation on the webpage.</p>
<ol>
   <li><strong>parse_url</strong> - <a href="https://www.php.net/manual/en/function.parse-url.php">https://www.php.net/manual/en/function.parse-url.php</a></li>
   <li><strong>file_get_contents</strong> - <a href="https://www.php.net/manual/en/function.file-get-contents.php">https://www.php.net/manual/en/function.file-get-contents.php</a></li>
   <li><strong>htmlentities</strong> - <a href="https://www.php.net/manual/en/function.htmlentities.php">https://www.php.net/manual/en/function.htmlentities.php</a></li>
   <li><strong>explode</strong> - <a href="https://www.php.net/manual/en/function.explode.php">https://www.php.net/manual/en/function.explode.php</a></li>
</ol>
<h2 id="dictionary">Dictionary</h2>
<p>There is a small collection of the dictionary (<strong><em>912 words</em></strong>) has been used in this application to replace &quot;<strong>English</strong>&quot; words into &quot;<strong>Odia</strong>&quot;. The dictionary follows <strong><em>Unicode</em></strong>  <strong><em>Collation</em></strong> in the SQL table for the &quot;Odia&quot; word column.</p>
<h2 id="notice">Notice</h2>
<p>The project is no longer maintained or supported.</p>
<h2 id="references">References</h2>
<ol>
   <li><strong>Odia Language</strong> - <a href="https://en.wikipedia.org/wiki/Odia_language">https://en.wikipedia.org/wiki/Odia_language</a></li>
   <li><strong>Oriya (Unicode block)</strong> - [<a href="https://en.wikipedia.org/wiki/Oriya_(Unicode_block">https://en.wikipedia.org/wiki/Oriya_(Unicode_block</a>)] (<a href="https://en.wikipedia.org/wiki/Oriya_(Unicode_block">https://en.wikipedia.org/wiki/Oriya_(Unicode_block</a>))</li>
   <li><strong>MySQL API</strong> - <a href="https://www.php.net/manual/en/book.mysql.php">https://www.php.net/manual/en/book.mysql.php</a></li>
   <li><strong>PHP API</strong> - <a href="https://www.php.net/manual/en/mysqlinfo.api.choosing.php">https://www.php.net/manual/en/mysqlinfo.api.choosing.php</a></li>
   <li><strong>Document Object Model</strong> - <a href="https://en.wikipedia.org/wiki/Document_Object_Model">https://en.wikipedia.org/wiki/Document_Object_Model</a></li>
</ol>
<h2>License</h2>
<p>This project is licensed under the <a href="https://github.com/Deeptiman/php-dom-parser-translation-tool/blob/master/LICENSE">MIT License</a></p>
