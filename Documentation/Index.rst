

.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


====================================
Simulate Static URLs TYPO3 Extension
====================================

This is a fork of the original simulatestatic extension. The extension was excluded from the TYPO3 core with version 6.0.

This version just makes the extension work with TYPO3 6.x+. Only minor changes are included.


Configuration
-------------

There are some tutorials online.
Maybe someone is willing to add his tutorial here?

Example TypoScript:

::

    config {
        simulateStaticDocuments = 1
        simulateStaticDocuments_addTitle = 40
        simulateStaticDocuments_noTypeIfNoTitle = 1
        simulateStaticDocuments_dontRedirectPathInfoError = 1
        simulateStaticDocuments_replacementChar = _

        // if you want some parameters shorter
        simulateStaticDocuments_pEnc = md5
        simulateStaticDocuments_pEnc_onlyP = cHash, L, print, tx_ttnews[backPid], tx_ttnews[tt_news], tx_ttnews[pS], tx_ttnews[pL], tx_ttnews[arc], tx_ttnews[cat], tx_ttnews[pointer], tx_ttnews[swords]
        // disbale the other one
        tx_realurl_enable = 0
    }



Properties
^^^^^^^^^^

.. container:: ts-properties

   ===================================================== =================================== ==========================
   Property                                              Data type                           Default
   ===================================================== =================================== ==========================
   `simulateStaticDocuments\_addTitle`_                  int
   `simulateStaticDocuments\_dontRedirectPathInfoError`_ boolean
   `simulateStaticDocuments\_noTypeIfNoTitle`_           boolean
   `simulateStaticDocuments\_pEnc\_onlyP`_               string
   `simulateStaticDocuments\_pEnc`_                      string
   `simulateStaticDocuments\_replacementChar`_           string
   `simulateStaticDocuments`_                            boolean or string                   
   ===================================================== =================================== ==========================




.. ### BEGIN~OF~TABLE ###


.. _setup-config-simulatestaticdocuments:

simulateStaticDocuments
"""""""""""""""""""""""

.. container:: table-row

   Property
         simulateStaticDocuments
   
   Data type
         boolean /
         
         string
   
   Description
         If set TYPO3 makes all links in another way than usual. This can be
         used with  **Apache compiled with mod\_rewrite and configured in
         httpd.conf for use of this in the ".htaccess"-files.**
         
         Include this in the .htaccess file
         
         ::
         
            RewriteEngine On
            RewriteRule   ^[^/]*\.html$  index.php
         
         This means that any "\*.html"-documents should be handled by
         index.php.
         
         Now if is done, TYPO3 will interpret the url of the html-document like
         this:
         
         [title].[id].[type].html
         
         Title is optional and only useful for the entries in the apache log-
         files. You may omit both [title] and [type] but if title is present,
         type must also be there!.
         
         **Example:**
         
         TYPO3 will interpret this as page with uid=23 and type=1 :
         
         ::
         
            Startpage.23.1.html
         
         TYPO3 will interpret this as the page with alias = "start" and the
         type is zero (default):
         
         ::
         
            start.html
         
         **Alternative option (PATH\_INFO):**
         
         Instead of using the rewrite-module in apache (eg. if you're running
         Windows!) you can use the PATH\_INFO variable from PHP.
         
         It's very simple. Just set simulateStaticDocuments to "PATH\_INFO" and
         you're up and running!
         
         **Also:** See below, .absRefPrefix
         
         **Example (put in Setup-field of your template):**
         
         ::
         
            config.simulateStaticDocuments = PATH_INFO
   
   Default
         default is defined by a configuration option in localconf.php. It's
         
         $TYPO3\_CONF\_VARS['FE']['simulateStaticDocuments'] = 1;
         
         This affects all sites in the database.
         
         You can also set this value to the string "PATH\_INFO"



.. _setup-config-simulatestaticdocuments-addtitle:

simulateStaticDocuments\_addTitle
"""""""""""""""""""""""""""""""""

.. container:: table-row

   Property
         simulateStaticDocuments\_addTitle
   
   Data type
         int
   
   Description
         If not zero, TYPO3 generates urls with the title in, limited to the
         first [simulateStaticDocuments\_addTitle] number of chars.
         
         **Example:**
         
         ::
         
            Startpage.23.1.html
         
         instead of the default, "23.1.html", without the title.
   
   Default



.. _setup-config-simulatestaticdocuments-notypeifnotitle:

simulateStaticDocuments\_noTypeIfNoTitle
""""""""""""""""""""""""""""""""""""""""

.. container:: table-row

   Property
         simulateStaticDocuments\_noTypeIfNoTitle
   
   Data type
         boolean
   
   Description
         If set, then the type-value will not be set in the simulated filename
         if the type value is zero anyways. However the filename must be
         without a title.
         
         **Example:**
         
         "Startpage.23.0.html" would  *still* be "Startpage.23.0.html"
         
         "23.0.html" would be "23.html" (that is without the zero)
         
         "23.1.html" would  *still* be "23.1.html"
   
   Default



.. _setup-config-simulatestaticdocuments-replacementchar:

simulateStaticDocuments\_replacementChar
""""""""""""""""""""""""""""""""""""""""

.. container:: table-row

   Property
         simulateStaticDocuments\_replacementChar
   
   Data type
         string
   
   Description
         Word separator for URLs generated by simulateStaticDocuments. If set
         to
         
         hyphen, this option allows search engines to index keywords in URLs.
         Before TYPO3 4.0 this character was hard-coded to underscore.
         
         Depends on the compatibility mode (see Tools>Install>Update wizard):
         
         *compatibility mode < 4.0:* underscore "\_"
         
         *compatibility mode >= 4.0:* hyphen "-"
   
   Default



.. _setup-config-simulatestaticdocuments-dontredirectpathinfoerror:

simulateStaticDocuments\_dontRedirectPathInfoError
""""""""""""""""""""""""""""""""""""""""""""""""""

.. container:: table-row

   Property
         simulateStaticDocuments\_dontRedirectPathInfoError
   
   Data type
         boolean
   
   Description
         Regarding PATH\_INFO mode:
         
         When a page is requested by "PATH\_INFO" method it must be configured
         in order to work properly. If PATH\_INFO is not configured, the
         index\_ts.php script sends a location header to the correct page.
         However if you better like an error message outputted, just set this
         option.
   
   Default



.. _setup-config-simulatestaticdocuments-penc:

simulateStaticDocuments\_pEnc
"""""""""""""""""""""""""""""

.. container:: table-row

   Property
         simulateStaticDocuments\_pEnc
   
   Data type
         string
   
   Description
         Allows you to also encode additional parameters into the simulated
         filename.
         
         **Example:**
         
         You have a news-plugin. The main page has the url "Page\_1.228.0.html"
         but when one clicks on a news item the url will be
         "Page\_1.228.0.html?&tx\_mininews\_pi1[showUid]=2&cHash=b8d239c224"
         instead.
         
         Now, this URL will not be indexed by external search-engines because
         of the query-string (everything after the "?" mark). This property
         avoids this problem by encoding the parameters. These are the options:
         
         **Value set to "base64":**
         
         This will transform the filename used to this value: "Page\_1.228+B6Jn
         R4X21pbmluZXdzX3BpMVtzaG93VWlkXT0yJmNIYXNoPWI4ZDIzOWMyMjQ\_.0.html".
         The query string has simply been base64-encoded (and some more...) and
         added to the HTML-filename (so now external search-engines will find
         this!). The really great thing about this that the filename is self-
         reliant because the filename contains the parameters. The downside to
         it is the very very long filename.
         
         **Value set to "md5":**
         
         This will transform the filename used to this value:
         
         "Page\_1.228+M57867201f4a.0.html". Now, what a lovely, short filename!
         Now all the parameters has been hashed into a 10-char string inserted
         into the filename. At the same time an entry has been added to a cache
         table in the database so when a request for this filename reaches the
         frontend, then the REAL parameter string is found in the database! The
         really great thing about this is that the filename is very short
         (opposite to the base64-method). The downside to this is that IF you
         clear the database cache table at any time, the URL here does NOT work
         until a page with the link has been generated again (re-inserting the
         parameter list into the database).
         
         **NOTICE:** From TYPO3 3.6.0 the encoding will work only on parameters
         that are manually entered in the list set by
         .simulateStaticDocuments\_pEnc\_onlyP (see right below) or those
         parameters that various plugins might allow in addition. This is to
         limit the run-away risk when many parameters gets combined.
   
   Default



.. _setup-config-simulatestaticdocuments-penc-onlyp:

simulateStaticDocuments\_pEnc\_onlyP
""""""""""""""""""""""""""""""""""""

.. container:: table-row

   Property
         simulateStaticDocuments\_pEnc\_onlyP
   
   Data type
         string
   
   Description
         A list of variables that may be a part of the md5/base64 encoded part
         of a simulate\_static\_document virtual filename (see property in the
         row above).
         
         **Example:**
         
         ::
         
            simulateStaticDocuments_pEnc_onlyP = tx_maillisttofaq_pi1[pointer], L, print
         
         -> this will allow the "pointer" parameter for the extension
         "maillisttofaq" to be included (in addition to whatever vars the
         extension sets itself) and further the parameter "L" (could be
         language selection) and "print" (could be print-version).
   
   Default




.. ###### END~OF~TABLE ######



Roadmap
-------

There's none. Just keep this extension working and fix bugs.

Generally I still like the concept of this extension. And for many use cases it is just fine.
But instead of working on this extension for new features,
I would prefer to write a new cleaner extension with the same features (and some more).


Contribute
----------

- Send pull requests to the repository. <https://github.com/colorcube/simulatestatic>
- Use the issue tracker for feedback and discussions. <https://github.com/colorcube/simulatestatic/issues>



Alternatives
------------

- realurl
- cooluri
- autourl https://github.com/smichaelsen/typo3-autourls
- nawork_uri (?)


**Why using this old technology? We have funky-whatever-url instead!**

Because it works! Reliable! Always!

Other speaking url solutions have a problem. It is impossible to decode such a url to a TYPO3 page without storing that url before with the relation to the page. If you loose that information you can't decode the url. This is broken by design.

*To be honest simulatestatic has also a feature to encode parameters in shorter urls which produces problems if you deleted the hash table. But still the right page would be displayed.*

> But the user can remember such urls!

Seriously?! Nobody types urls by hand, therefore it doesn't matter.

> But Google want speaking urls!

No. Maybe. I don't care.

> But it looks better.

Sometimes it looks nice, but often the urls get so long, it is just a massive line of text nobody looks at.

> It seems you dont' like the xxxxurl extension very much.

Well, every time I have a weird problem in TYPO3, the first thing is to deactivate xxxxurl.