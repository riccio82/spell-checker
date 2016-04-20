/*----------------------------------------------------------------------------\
|                             TRANSLATED
|                   ( http://www.translated.net/ )
|								2007-04
|                Added:
|						Language identification,
|						Multilanguage support,
|                       UTF-8 support,
|                       IE7 compatibility,
|						personal dictionary support,
|						multi-keyboards support
|
\-----------------------------------------------------------------------------*/

/*----------------------------------------------------------------------------\
|                           DHTML Spell Checker 1.0                           |
|-----------------------------------------------------------------------------|
|                          Created by Emil A Eklund                           |
|                        (http://eae.net/contact/emil)                        |
|-----------------------------------------------------------------------------|
| A real time spell checker that underline misspelled words as you type. Uses |
| XML HTTP to communicate  with a server side component that  does the actual |
| dictionary lookup. Compatible with IE6 and Mozilla.                         |
|-----------------------------------------------------------------------------|
|                      Copyright (c) 2005 Emil A Eklund                       |
|- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -|
| This program is  free software;  you can redistribute  it and/or  modify it |
| under the terms of the MIT License.                                         |
|- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -|
| Permission  is hereby granted,  free of charge, to  any person  obtaining a |
| copy of this software and associated documentation files (the "Software"),  |
| to deal in the  Software without restriction,  including without limitation |
| the  rights to use, copy, modify,  merge, publish, distribute,  sublicense, |
| and/or  sell copies  of the  Software, and to  permit persons to  whom  the |
| Software is  furnished  to do  so, subject  to  the  following  conditions: |
| The above copyright notice and this  permission notice shall be included in |
| all copies or substantial portions of the Software.                         |
|- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -|
| THE SOFTWARE IS PROVIDED "AS IS",  WITHOUT WARRANTY OF ANY KIND, EXPRESS OR |
| IMPLIED,  INCLUDING BUT NOT LIMITED TO  THE WARRANTIES  OF MERCHANTABILITY, |
| FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE |
| AUTHORS OR  COPYRIGHT  HOLDERS BE  LIABLE FOR  ANY CLAIM,  DAMAGES OR OTHER |
| LIABILITY, WHETHER  IN AN  ACTION OF CONTRACT, TORT OR  OTHERWISE,  ARISING |
| FROM,  OUT OF OR  IN  CONNECTION  WITH  THE  SOFTWARE OR THE  USE OR  OTHER |
| DEALINGS IN THE SOFTWARE.                                                   |
|- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -|
|                         http://eae.net/license/mit                          |
\----------------------------------------------------------------------------*/

/* Word status flags */
var RTSS_UNKNOWN_WORD = 0;
var RTSS_VALID_WORD   = 1;
var RTSS_INVALID_WORD = 2;
var RTSS_PENDING_WORD = 3;

/*----------------------------------------------------------------------------\
|                      WebFXSpellChecker Implementation                       |
\----------------------------------------------------------------------------*/

var webFXSpellCheckHandler = {

	activeRequest        : false,
   	activeRequestLangID  : false,
	words                : new Array(),
	pending              : new Array(),
	activeWord           : null,
	instances            : new Array(),
	serverURI            : 'spell_check.php',
	serverURILangID      : 'language_identification.php',
	invalidWordBg        : 'url(http://free.translated.net/gif/redline.png) repeat-x bottom',
	httpMethod           : 'GET',
    wordsPerReq    	     : 100,
    rescanning           : false,   //added
    endword		         : false 	//added

};


function WebFXSpellChecker(el, bAllowRich) {
	var agt, isIe, isGecko, o, elRich;

	agt = navigator.userAgent.toLowerCase();
	isIE    = ((agt.indexOf("msie")  != -1) && (agt.indexOf("opera") == -1));
	isGecko = ((agt.indexOf('gecko') != -1) && (agt.indexOf("khtml") == -1));

	/*if ((!isIE) && (!isGecko)) {
		this.el        = el;
		this.supported = false;
		return;
	}*/

	elRich = document.createElement('iframe');

	this.supported = true;
	elRich.className = 'webfx-spelltextbox';
	el.parentNode.insertBefore(elRich, el);
	elRich.style.width = el.offsetWidth + 'px';
	elRich.style.height = el.offsetHeight + 'px';
	el.style.display = 'none';

	if (webFXSpellCheckHandler.instances.length == 0) {
        webFXSpellCheckHandler._init();
    }

	o = new Object();
	o.el = elRich;
	o.doc = null;
	o.self = this;
	webFXSpellCheckHandler.instances.push(o);

	this.el   = el;
	this.rich = elRich;
	this.doc = '';
	this.allowRich = bAllowRich;

	window.setTimeout(function() {
		var doc = elRich.contentDocument || elRich.contentWindow.document;
		doc.designMode = "on";
		window.setTimeout(function() {
			doc.body.style.background = 'window';
			doc.body.style.color = 'windowtext';
			doc.body.style.padding = '0.5ex';
			doc.body.style.margin = '0px';
			doc.body.style.fontFamily = 'menu';
			doc.body.style.border = 'none';
			if ("addEventListener" in doc) {
			    //mozilla
				doc.addEventListener("keypress", webFXSpellCheckHandler._handleKey,          false);
				doc.addEventListener("keyup",    webFXSpellCheckHandler._handleKeyUp,        false);
				doc.addEventListener("click",    webFXSpellCheckHandler._handleContextMenu,  false);
			}
			else if ("attachEvent" in doc) {
			    //IE
				doc.attachEvent("onkeyup",       webFXSpellCheckHandler._handleKeyUp);
				doc.attachEvent("onkeypress",    webFXSpellCheckHandler._handleKeyPress);
				doc.body.attachEvent("onpaste",  webFXSpellCheckHandler._handlePaste);
				doc.attachEvent("onclick",       webFXSpellCheckHandler._handleContextMenu);
				doc.attachEvent("oncontextmenu", webFXSpellCheckHandler._handleContextMenu);
			}
			doc._text = el;
			if (webFXSpellCheckHandler.instances.length == 0) { webFXSpellCheckHandler._init(); }
			o.doc = doc
			o.self.doc = doc;
		}, 100);
	}, 0);
}


WebFXSpellChecker.prototype.fromForm = function() {
	if (!this.supported) { return; }
	this.el.value = this.getText();
}


WebFXSpellChecker.prototype.toForm = function() {
	if (!this.supported) { return; }
	 this.setText(this.el.value);
}


WebFXSpellChecker.prototype.getText = function() {
	if (!this.supported) {
		return this.el.value;
	}
	return webFXSpellCheckHandler.getInnerText(this.doc.body);
};


WebFXSpellChecker.prototype.getHTML = function() {
	if (!this.supported) { return this.el.value; }
	return webFXSpellCheckHandler.getInnerHTML(this.doc.body);
};


WebFXSpellChecker.prototype.setText = function(str) {
	var i, len, c, str, node;

	if (!this.supported) { this.el.value = str; return; }

	while (this.doc.body.firstChild) {
		this.doc.body.removeChild(this.doc.body.firstChild); }

	len = str.length;
	word = '';
	for (i = 0; i < len; i++) {
		c = str.substr(i, 1);
		//if (!c.match(/[\w\']/)) { // Match all but numbers, letters, - and '
        if(!CustomMatch(c)) {
            if (word) {
				this.doc.body.appendChild(webFXSpellCheckHandler._createWordNode(word, this.doc));
			}
			this.doc.body.appendChild(this.doc.createTextNode(c));
			word = '';
		} else {
			word += c;
		}
	}
	if (word) {
		this.doc.body.appendChild(this.doc.createTextNode(word));
	}
};


WebFXSpellChecker.prototype.rescan = function() {
	if (!this.supported) {
        return;
    }
    
	webFXSpellCheckHandler._hideSuggestionsMenu();
    webFXSpellCheckHandler.rescanning = true;
	webFXSpellCheckHandler._rescanNode(this.doc.body, this.doc, this.allowRich);
    webFXSpellCheckHandler.rescanning = false;
}


WebFXSpellChecker.prototype.execCommand = function(sCmd, bShow, sValue) {
	if (!this.supported) {
		return;
	}

	if (document.getElementById('webfxSpellCheckMenu').style.display == 'none') {
		if (this.allowRich) {
			this.doc.execCommand(sCmd, bShow, sValue);
		}
	}
};


/*----------------------------------------------------------------------------\
|                               Static Methods                                |
\----------------------------------------------------------------------------*/

webFXSpellCheckHandler._handleKey = function(e) {

	var el = e.target || e.srcElement;

	webFXSpellCheckHandler._hideSuggestionsMenu();
	if (e.charCode) {
		webFXSpellCheckHandler._char = String.fromCharCode(e.charCode);
	}
	else {
		if (e.keyCode == 13) {
		    webFXSpellCheckHandler._char = '\n';
		    webFXSpellCheckHandler._moz_parseActiveNode(e, el.ownerDocument);
		    return;
		}
		webFXSpellCheckHandler._char = '';
	}
};

webFXSpellCheckHandler._handleKeyPress = function(e) {
	var n, el = e.target || e.srcElement;

    webFXSpellCheckHandler._hideSuggestionsMenu();
    webFXSpellCheckHandler.endword = false;
    
	if (document.all) {
	        if ((e.keyCode == 32) || (e.keyCode == 44) || (e.keyCode == 46) || (e.keyCode == 45) || (e.keyCode == 58) || (e.keyCode == 59)) {
				webFXSpellCheckHandler.endword = true;
				//webFXSpellCheckHandler._ie_parseActiveNode(el.ownerDocument || el.document);
			} 
	}
	
};

webFXSpellCheckHandler._handleKeyUp = function(e) {
    var n, el = e.target || e.srcElement;

	webFXSpellCheckHandler._hideSuggestionsMenu();

	/* Internet Explorer */
	if (document.all) {
	    if (e.keyCode == 13) {
			for (n = 0; n < webFXSpellCheckHandler.instances.length; n++) {
			  if (webFXSpellCheckHandler.instances[n].doc == el.ownerDocument) {
                window.setTimeout('webFXSpellCheckHandler.instances[' + n + '].self.rescan();', 100);
		      }
        	}
        } else {
		    if(webFXSpellCheckHandler.endword) {
	         	webFXSpellCheckHandler.endword = false;
		    	webFXSpellCheckHandler._ie_parseActiveNode(el.ownerDocument || el.document);
			}
        }
	} else {
	    /* Mozilla */
		webFXSpellCheckHandler._moz_parseActiveNode(e, el.ownerDocument);
	}


};


webFXSpellCheckHandler._handlePaste = function(e) {
	var n, el =  el = e.target || e.srcElement;
	
	if(document.all) { 
	    //var sNewString;
		//var testo = window.clipboardData.getData("Text");
		//alert(testo);
		//sNewString = testo.slice(0,400); //CUT 400 CHARS
		//sNewString = testo;
		//window.clipboardData.setData("Text", sNewString);
	} else {
		//alert("FireFox");
	}

 	for (n = 0; n < webFXSpellCheckHandler.instances.length; n++) {
		if (webFXSpellCheckHandler.instances[n].doc == el.ownerDocument) {
			window.setTimeout('webFXSpellCheckHandler.instances[' + n + '].self.rescan();', 100);
		}
	}
};


webFXSpellCheckHandler._handleContextMenu = function(e) {
	var el = e.target || e.srcElement;

	if ((el.tagName == 'SPAN') && (el.firstChild)) {
		var word = el.firstChild.nodeValue;
		if ((webFXSpellCheckHandler.words[word]) && (webFXSpellCheckHandler.words[word][0] == RTSS_INVALID_WORD)) {
			webFXSpellCheckHandler._showSuggestionMenu(e, el, word);
			if (document.all) {
				return false;
			} else {
				e.preventDefault();
			}
			return;
		}
	}
	
	webFXSpellCheckHandler._hideSuggestionsMenu();
};


webFXSpellCheckHandler._init = function() {
	var menu, inner, item;

	menu = document.createElement('div');
	menu.id = 'webfxSpellCheckMenu';
	menu.className = 'webfx-spellchecker-menu';
	menu.style.display = 'none';

	inner = document.createElement('div');
	inner.className = 'inner';
	menu.appendChild(inner);

	item = document.createElement('div');
	item.className = 'separator';
	inner.appendChild(item);

	item = document.createElement('a');
	item.href = 'javascript:webFXSpellCheckHandler._ignoreWord();';
	item.appendChild(document.createTextNode(msg_ignore)); //'Ignore'));
	inner.appendChild(item);

    item = document.createElement('div');
	item.className = 'separator';
	inner.appendChild(item);

	item = document.createElement('a');
	item.href = 'javascript:webFXSpellCheckHandler._addWord(\'\');';
	item.id = 'add_word';
	item.appendChild(document.createTextNode('Add word'));
	inner.appendChild(item);
	
	item = document.createElement('div');
	item.className = 'separator';
	inner.appendChild(item);
	
	item = document.createElement('a');
	item.href = 'javascript:open_search(\'\');';
	item.id = 'search_word';
	item.appendChild(document.createTextNode(msg_search));
	inner.appendChild(item);


	document.body.appendChild(menu);
};


webFXSpellCheckHandler._spellCheck = function(word) {
	
    if(!webFXSpellCheckHandler.rescanning) {
        if (webFXSpellCheckHandler.words[word]) {
            return webFXSpellCheckHandler.words[word][0];
        }
    }

	webFXSpellCheckHandler.words[word] = [RTSS_PENDING_WORD];
	webFXSpellCheckHandler.pending.push(word);
	if (!webFXSpellCheckHandler.activeRequest) {
        window.setTimeout('webFXSpellCheckHandler._askServer()', 10);
    }

	return RTSS_PENDING_WORD;
};


webFXSpellCheckHandler._createWordNode = function(word, doc) {
    var node = doc.createElement('span');
	node.className = 'webfx-spellchecker-word';
	node.style.lineHeight = '1.5em';
	node.appendChild(doc.createTextNode(word));
    switch (webFXSpellCheckHandler._spellCheck(word)) {
		case RTSS_VALID_WORD:
		case RTSS_PENDING_WORD: node.style.background = 'none';
            break;
		case RTSS_INVALID_WORD: node.style.background = webFXSpellCheckHandler.invalidWordBg;
            break;
	};
	return node;
};


webFXSpellCheckHandler._createEmptyWordNode = function(doc) {
	var node = doc.createElement('span');
	node.className = 'webfx-spellchecker-word';
	node.style.lineHeight = '1.5em';
	return node;
};


webFXSpellCheckHandler._updateWords = function() {
	var aNodes, i, n, len, eInstance, ow;
	for (n = 0; n < webFXSpellCheckHandler.instances.length; n++) {
		aNodes = webFXSpellCheckHandler.instances[n].doc.getElementsByTagName('span');
		len = aNodes.length;
		for (i = 0; i < len; i++) {
			if (aNodes[i].childNodes.length != 1) { continue; }
			if (aNodes[i].firstChild.nodeType != 3) { continue; }
			ow = webFXSpellCheckHandler.words[aNodes[i].firstChild.nodeValue];
			if (!ow) { continue; }
			switch (ow[0]) {
				case RTSS_VALID_WORD:
				case RTSS_PENDING_WORD: aNodes[i].style.background = 'none';                               break;
				case RTSS_INVALID_WORD: aNodes[i].style.background = webFXSpellCheckHandler.invalidWordBg; break;
			};
}	}	};

/*
 * This is where the magic happens, for each keypress this method
 * evaluates the conditions and, depending on them, updates the active
 * word and if required the previous and next ones. This incremental
 * approach is quite efficient but can't handle paste operations very
 * well.
 */
webFXSpellCheckHandler._moz_parseActiveNode = function(e, doc) {
	var sel, offset, str, node, r, n, b;

	sel = doc.defaultView.getSelection();
	offset = sel.focusOffset;

	/*
	 * If two words are right next to eachother, as a result of a backspace
	 * or delete action, merge them.
	 */

	if ((sel.focusNode.nodeType == 1) && (sel.focusNode.nodeValue == null) && (webFXSpellCheckHandler._char != '\n')) {
		if (((!sel.focusNode.previousSibling) || (sel.focusNode.previousSibling.tagName != 'BR')) && ((!sel.focusNode.focusNode) || (sel.focusNode.focusNode.tagName != 'BR'))) {
			var node = webFXSpellCheckHandler._createEmptyWordNode(doc);
			r = sel.getRangeAt(0);
			r.insertNode(node);
			if (!node.previousSibling) { return; }
			str = webFXSpellCheckHandler.getInnerText(node.previousSibling);
			offset = str.length;
			str += webFXSpellCheckHandler.getInnerText(node.nextSibling);
			webFXSpellCheckHandler._setSingleWord(node, str);
			node.parentNode.removeChild(node.previousSibling);
			node.parentNode.removeChild(node.nextSibling);
			try {
				sel.removeAllRanges();
				r = doc.createRange();
				r.setStart(node.firstChild, offset);
				r.setEnd(node.firstChild, offset);
				sel.addRange(r);
			}
			catch (oe) { }
		}
		return;
	}
    
	if ((sel.focusNode) && (sel.focusNode.nodeType == 3)) {
		b = false;

		if ((webFXSpellCheckHandler._char == '\n') && (str.length == sel.focusOffset)) {
			str = webFXSpellCheckHandler.getInnerText(sel.focusNode);
			webFXSpellCheckHandler._setWord2(sel.focusNode, str);
			return;
		}

		/* Text entered inside an exisiting word, update it */
		if (sel.focusNode.parentNode.className == 'webfx-spellchecker-word') {
			b = true;
			node = sel.focusNode.parentNode;
			str = webFXSpellCheckHandler.getInnerText(sel.focusNode.parentNode);
		}

		/* Text entered outside word, create a new one */
		else {
		
			if (!webFXSpellCheckHandler._char) {
				return;
			}

            //alert(webFXSpellCheckHandler._char);
            
			//if (webFXSpellCheckHandler._char.match(/[\w\']/)) { // Match numbers, letters, - and '
			if(CustomMatch(webFXSpellCheckHandler._char)) {
                return;
			}
			str = webFXSpellCheckHandler.getInnerText(sel.focusNode);
			node = webFXSpellCheckHandler._createEmptyWordNode(doc);
			sel.focusNode.parentNode.insertBefore(node, sel.focusNode);
			if ((!sel.focusNode.nextSibling) && (sel.focusNode.parentNode == doc.body)) {
				sel.focusNode.parentNode.appendChild(document.createTextNode(''));
			}
			sel.focusNode.parentNode.removeChild(sel.focusNode);
		}

		/* Update words inside selection */
		n = webFXSpellCheckHandler._setWord(node, str);
		sel.removeAllRanges();
		r = doc.createRange();

		/* Clean up unused nodes */
		if (node.firstChild) { node = node.firstChild; }
		else {
			node = node.previousSibling;
			node.parentNode.removeChild(node.nextSibling);
			while (node.firstChild) { node = node.firstChild; }
		}

		/* Get length of word, used to determine the caret position */
		len = node.nodeValue.length;
		/* Handle word split (separator inserted inside a word) */
		if ((n > 1) && (len != str.length) && (b)) {
			node = node.parentNode;
			n = webFXSpellCheckHandler._checkWord(node);
			if (n) {
				r.setStart(node.firstChild, 0);
				r.setEnd(node.firstChild, 0);
		}	}

		/* Text entered inside a word, restore caret position */
		else if ((b) && (offset <= len)) {
			r.setStart(node, offset);
			r.setEnd(node, offset);
		}

		/* Text entered at end of word, set caret to end */
		else {
			r.setStart(node, len);
			r.setEnd(node, len);
		}

		/*
		 * Safe set caret operation, since it's quite critical that
		 * it's set a sensible backup will be used on failure.
		 */
		try { sel.addRange(r); }
		catch(oe) {
			r.setStart(node, 0);
			r.setEnd(node, 0);
			sel.addRange(r);
		}
	}
}

/*
 * The IE implementation is quite similar to the mozilla one, however
 * to get the active text node here the range object and it's expand
 * methods are used.
 */
webFXSpellCheckHandler._ie_parseActiveNode = function(doc) {
	var sr, el, str, cont, i, len, start, r, offset, newword, word;

	/* Get caret position */
	sr = doc.selection.createRange();
	el = sr.parentElement();
	r = doc.body.createTextRange();
	r.setEndPoint("EndToStart", sr);
	offset = r.text.length;
	
	/* An existing word is being edited */
	if (el.className == 'webfx-spellchecker-word') {
		word = webFXSpellCheckHandler.getInnerText(el);
		webFXSpellCheckHandler._setWord2(el, word, true);
	}

	/* A new word has been entered */
	else {
	    sr.moveStart('character', -2);
		sr.expand('word');
		sr.moveEnd('character', -1);
		sr.select();
		word = sr.text;
		
		//if (word.match(/[\w\']+/)) { // Match numbers, letters, - and '
        if(CustomMatch(word)){
			var node = document.createElement('span');
			node.className = 'webfx-spellchecker-word';
			node.style.lineHeight = '1.5em';
			webFXSpellCheckHandler._setSingleWord(node, word);
			sr.pasteHTML(node.outerHTML);
	}	}

	/* Restore caret position */
	sr = doc.selection.createRange();
	sr.moveToPoint(0, 0);
	sr.moveStart('character', offset);
	sr.moveEnd('character', offset);
	sr.collapse();
	sr.select();
}

webFXSpellCheckHandler._getLang = function(txt) {

    var words = txt.split(/\s/g);
    var k = words.length;
    var async = true;
    
    if(k > 7) {
        ShowWaitCursor();
        
        webFXSpellCheckHandler.activeRequestLangID = true;
        arg = "txt="+txt;

        if (webFXSpellCheckHandler.httpMethod == 'GET') {
            arg = arg.slice(0,300);
            uri = webFXSpellCheckHandler.serverURILangID + '?' + encodeURI(arg);
	    	arg = '';
        } else {
            uri = webFXSpellCheckHandler.serverURILangID;
        }
        
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            if (!xmlHttp) {
                webFXSpellCheckHandler.activeRequestLangID = false;
                HideWaitCursor();
                return;
            }
        }
        
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4) {
            	webFXSpellCheckHandler._serverResponseHandlerLangIdent(xmlHttp.responseText);
        	}
        };
        
		xmlHttp.open(webFXSpellCheckHandler.httpMethod, uri, async);
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlHttp.setRequestHeader("Content-Length", arg.length);
        xmlHttp.send(arg);
	}
};


webFXSpellCheckHandler._serverResponseHandlerLangIdent = function(sData) {
	var lang = sData;
    var sel = document.getElementById('source_lang');
    var k =  sel.length;
    var selIndex = 1000;
    var app = "";
    for(i=0;i<k;i++) {
        app = sel[i].value
        if(app == lang) {
            selIndex = i;
        }
    }
    if(selIndex < 1000) {
        document.getElementById('source_lang').selectedIndex = selIndex;
    }
    HideWaitCursor();
    o.rescan();
};



webFXSpellCheckHandler._askServer = function() {
	var i, len, uri, arg, word, aMap, xmlHttp;
	var async = true;

	if (webFXSpellCheckHandler.activeRequest) {
        return;
    }

	arg = '';
	
	len = webFXSpellCheckHandler.pending.length;

	if (len) {
        var selIndex = document.getElementById('source_lang').selectedIndex;
        var language = document.getElementById('source_lang').options[selIndex].value;

		if(language=='auto') {
            if(!webFXSpellCheckHandler.activeRequestLangID)  {
                var txt = o.getText();
                webFXSpellCheckHandler._getLang(txt);
            }
            return;
        } else {
            ShowWaitCursor();
            webFXSpellCheckHandler.activeRequestLangID = false;
        }

		webFXSpellCheckHandler.activeRequest = true;
		aMap = new Array();

		if (len > webFXSpellCheckHandler.wordsPerReq) {
            len = webFXSpellCheckHandler.wordsPerReq;
        }

		for (i = 0; i < len; i++) {
			word = webFXSpellCheckHandler.pending.shift();

            arg += ((i)?';':'') + encodeURI(word);
			webFXSpellCheckHandler.words[word] = [RTSS_PENDING_WORD];
			aMap[i] = word;
		}
        //alert(arg);

        arg = 'source_lang='+language+'&words='+arg;

		if (webFXSpellCheckHandler.httpMethod == 'GET') {
			uri = webFXSpellCheckHandler.serverURI + '?' + arg;
			arg = '';
		} else {
            uri = webFXSpellCheckHandler.serverURI;
        }

		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		} else if (window.ActiveXObject) {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			if (!xmlHttp) {
			    webFXSpellCheckHandler.activeRequest = false;
			    HideWaitCursor();
                return;
            }
		}
		xmlHttp.onreadystatechange = function() {
				if (xmlHttp.readyState == 4) {
					webFXSpellCheckHandler._serverResponseHandler(xmlHttp.responseText, aMap);
				}
	  	    };

		xmlHttp.open(webFXSpellCheckHandler.httpMethod, uri, async);
  	    //xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  	    //xmlHttp.setRequestHeader("Content-Length", arg.length);
  	    xmlHttp.send(arg);
    }
};


webFXSpellCheckHandler._serverResponseHandler = function(sData, aMap) {
	var i, flag, len, data, word, suggestions;
    var app,k;
	try {
		eval(sData);
	} catch (oe) {
        return;
    }
    len = data.length;

	for (i = 0; i < len; i++) {
		flag = data[i][0];
		word = aMap[i];
		suggestions = data[i][1];
        
        if(suggestions) {
            app = new Array();
            for (k = 0; k < suggestions.length; k++) {
                app[k] =  decodeURI(suggestions[k]);
            }
            suggestions = app;
        }
       
		if (!webFXSpellCheckHandler.words[word]) {
			return;
		}
		switch (flag) {
			case 0:
				webFXSpellCheckHandler.words[word][0] = RTSS_INVALID_WORD;
				webFXSpellCheckHandler.words[word][1] = suggestions;
				break;
			case 1:
				webFXSpellCheckHandler.words[word][0] = RTSS_VALID_WORD;
				break;
		};
	}
	webFXSpellCheckHandler.activeRequest = false;
	webFXSpellCheckHandler._updateWords();
	if(webFXSpellCheckHandler.pending.length) {
        webFXSpellCheckHandler._askServer();
    } else {
		HideWaitCursor();
    }
};


webFXSpellCheckHandler._addWord = function(word) {
    ShowWaitCursor();

	var lang, arg, aMap;
	var async = true;
	
	if(word) {
	    var selIndex = document.getElementById('source_lang').selectedIndex;
        var language = document.getElementById('source_lang').options[selIndex].value;

        if(language=='auto') {
            HideWaitCursor();
			return;
		}
		
		arg = 'action=ADDWORD&word='+encodeURI(word)+'&source_lang='+language;
		
		if (webFXSpellCheckHandler.httpMethod == 'GET') {
			uri = webFXSpellCheckHandler.serverURI + '?' + arg;
			arg = '';
		} else {
            uri = webFXSpellCheckHandler.serverURI;
        }

		if (window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		} else if (window.ActiveXObject) {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			if (!xmlHttp) {
			    HideWaitCursor();
                return;
            }
		}
		
		xmlHttp.onreadystatechange = function() {
				if (xmlHttp.readyState == 4) {
					webFXSpellCheckHandler._addWordResponseHandler(xmlHttp.responseText, aMap);
				}
	  	};

		xmlHttp.open(webFXSpellCheckHandler.httpMethod, uri, async);
  	    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  	    xmlHttp.setRequestHeader("Content-Length", arg.length);
  	    xmlHttp.send(arg);
	}

	webFXSpellCheckHandler._hideSuggestionsMenu();
};

webFXSpellCheckHandler._addWordResponseHandler = function(responseText, aMap) {

	try {
		eval(responseText);
	} catch (oe) {
	    return;
    }

	if(res) {
	    o.rescan();
	} else {
		alert(msg_not_added);
	}

	HideWaitCursor();
};

webFXSpellCheckHandler._showSuggestionMenu = function(e, el, word) {
	var menu, len, item, sep, frame, aSuggestions, doc, x, y, o;

 	if (!webFXSpellCheckHandler.words[word]) { return; }

	menu = document.getElementById('webfxSpellCheckMenu');
	len = menu.firstChild.childNodes.length;

 	item = document.getElementById('add_word');
 	item.href='javascript: webFXSpellCheckHandler._addWord("'+word+'")';
 	item.innerHTML = msg_add+' <B>'+word+'</B>'; 	
 
 	item = document.getElementById('search_word');
 	item.href='javascript:open_search("'+word+'");';
 	 	
	while (len > 6) {
		menu.firstChild.removeChild(menu.firstChild.firstChild);
		len--;
	}
	sep = menu.firstChild.firstChild;

	aSuggestions = webFXSpellCheckHandler.words[word][1];
	len = aSuggestions.length;
	if (len > 10) {
		len = 10;
	}
	for (i = 0; i < len; i++) {
		item = document.createElement('a');
		item.href = 'javascript:webFXSpellCheckHandler._replaceWord("' + aSuggestions[i] + '");'
		item.appendChild(document.createTextNode(aSuggestions[i]));
		menu.firstChild.insertBefore(item, sep);
	}
	if (len == 0) {
		item = document.createElement('a');
		item.href = 'javascript:void()'
		item.appendChild(document.createTextNode(msg_no_sugg));
		menu.firstChild.insertBefore(item, sep);
	}

	var n;
	
	for (n = 0; n < webFXSpellCheckHandler.instances.length; n++) {
		if (webFXSpellCheckHandler.instances[n].doc == el.ownerDocument) {
			frame = webFXSpellCheckHandler.instances[n].el;
			doc   = webFXSpellCheckHandler.instances[n].doc;
		}
	}

	x = 0;
	y = 0;
	
	for (o = frame; o; o = o.offsetParent) {
		x += (o.offsetLeft - o.scrollLeft);
		y += (o.offsetTop - o.scrollTop);
	}

	if (document.all) {
		menu.style.left = x + (e.pageX || e.clientX) + 'px';
		menu.style.top  = y + (e.pageY || e.clientY) + (el.offsetHeight/2) + 'px';
	} else {
		menu.style.left = x + ((e.pageX || e.clientX) - doc.body.scrollLeft) + 'px';
		menu.style.top  = y + ((e.pageY || e.clientY) - doc.body.scrollTop) + (el.offsetHeight/2) + 'px';
	}
	menu.style.display = 'block';

	webFXSpellCheckHandler.activeWord = el;
};


webFXSpellCheckHandler._replaceWord = function(word) {
	if (webFXSpellCheckHandler.activeWord) {
		webFXSpellCheckHandler._setWord(webFXSpellCheckHandler.activeWord, word);
		if (!document.all) {
			webFXSpellCheckHandler.activeWord.ownerDocument.defaultView.focus();
			try {
				sel = webFXSpellCheckHandler.activeWord.ownerDocument.defaultView.getSelection();
				r = sel.getRangeAt(0);
				sel.removeAllRanges();
				r = document.createRange();
				r.setStart(webFXSpellCheckHandler.activeWord.nextSibling, 1);
				r.setEnd(webFXSpellCheckHandler.activeWord.nextSibling, 1);
				sel.addRange(r);
			}
			catch(oe) { }
	}	}
	webFXSpellCheckHandler._hideSuggestionsMenu();
};


webFXSpellCheckHandler._ignoreWord = function() {
	var word, doc;

	if (webFXSpellCheckHandler.activeWord) {
		word = webFXSpellCheckHandler.activeWord.firstChild.nodeValue;
		if (!webFXSpellCheckHandler.words[word]) {
            webFXSpellCheckHandler.words[word] = [1];
        } else {
            webFXSpellCheckHandler.words[word][0] = 1;
        }
		doc = webFXSpellCheckHandler.activeWord.ownerDocument || webFXSpellCheckHandler.activeWord.document;
		webFXSpellCheckHandler._rescanNode(doc.body, doc, true);
	}
	webFXSpellCheckHandler._hideSuggestionsMenu();
};


webFXSpellCheckHandler._hideSuggestionsMenu = function() {
	document.getElementById('webfxSpellCheckMenu').style.display = 'none';
	webFXSpellCheckHandler.activeWord = null;
};


webFXSpellCheckHandler._rescanNode = function(el, doc, bAllowRich) {
	var aNodes, i, n, len, eInstance, word, node, o;

	var num_chars = 0;
	HideCharsAlarm();
	
    if (bAllowRich) {
        el.innerHTML = webFXSpellCheckHandler.getInnerHTML(el);

		aNodes = new Array();
		node = el.firstChild;
		while (node) {
				if ((node.nodeType == 1) && (node.className == 'webfx-spellchecker-word')) {
					node.className = '';
					aNodes.push(node);
				} else if (node.nodeType == 3) {
				    if(num_chars<2003) {
				        num_chars += node.nodeValue.length;
				        aNodes.push(node);
				    } else {
                        ShowCharsAlarm();
					}
	            }
				if (node.firstChild) {
	                node = node.firstChild;
	            } else if (node.nextSibling) {
	                node = node.nextSibling;
	            } else {
					for (node = node.parentNode; node; node = node.parentNode) {
						if (node.nextSibling) {
	                        node = node.nextSibling; break;
	                    }
			        }
	            }
        }
        
        
		len = aNodes.length;
		for (i = 0; i < len; i++) {
			node = aNodes[i];
			word = webFXSpellCheckHandler.getInnerText(node);
			
			webFXSpellCheckHandler._setWord2(node, word);
	    }

    } else {
        node = el;
		if (node.firstChild) {
            word = webFXSpellCheckHandler.getInnerText(node);
			while (node.firstChild) {
                node.removeChild(node.firstChild);
            }
			node.appendChild(doc.createTextNode(''));
			webFXSpellCheckHandler._setWord2(node.firstChild, word, true);
        }
    }
};


webFXSpellCheckHandler._setWord = function(el, word) {
	var i, len, c, str, node, doc, n;

	doc = el.ownerDocument || el.document;
	while (el.firstChild) { el.removeChild(el.firstChild); }

	len = word.length;
	str = '';
	n = 0;
	for (i = 0; i < len; i++) {
		c = word.substr(i, 1);
        //if (!c.match(/[\w\']/)) { // Match all but numbers, letters, - and '
		if(!CustomMatch(c)) {
             if (str) { el.parentNode.insertBefore(webFXSpellCheckHandler._createWordNode(str, doc), el); }
            el.parentNode.insertBefore(doc.createTextNode(c), el);
            str = '';
            n++;
        }   else { str += c; }
	}
	if (str) { webFXSpellCheckHandler._setSingleWord(el, str);  n++; }

	return n;
};


webFXSpellCheckHandler._setWord2 = function(el, word, bAllowRich) {
	var i, len, c, str, node, doc, n, newNode;

	doc = el.ownerDocument || el.document;
	len = word.length;
	str = '';
	n = 0;

	for (i = 0; i < len; i++) {
		c = word.substr(i, 1);

		//if (!c.match(/[\w\']/)) { // Match all but numbers, letters, - and '
		if(!CustomMatch(c)) {

		    if (str) {
                el.parentNode.insertBefore(webFXSpellCheckHandler._createWordNode(str, doc), el);
            }
            if ((c == '\n') && (bAllowRich)) {
                newNode = doc.createElement('br');
            }
            else {newNode = doc.createTextNode(c); }
            el.parentNode.insertBefore(newNode, el);
            str = '';
            n++;
        } else {
            str += c;
        }

	}

	if (str) {
		el.parentNode.insertBefore(webFXSpellCheckHandler._createWordNode(str, doc), el);
	}

	el.parentNode.removeChild(el);

	return n;
};


webFXSpellCheckHandler._setSingleWord = function(el, word) {
	var doc = el.ownerDocument || el.document;
	while (el.firstChild) { el.removeChild(el.firstChild); }
	el.appendChild(doc.createTextNode(word));
	switch (webFXSpellCheckHandler._spellCheck(word)) {
		case RTSS_VALID_WORD:
		case RTSS_PENDING_WORD: el.style.background = 'none';                               break;
		case RTSS_INVALID_WORD: el.style.background = webFXSpellCheckHandler.invalidWordBg; break;
	};
};


webFXSpellCheckHandler._checkWord = function(el) {
	webFXSpellCheckHandler._setWord(el, webFXSpellCheckHandler.getInnerText(el));
};


webFXSpellCheckHandler.getInnerText = function(node) {
	var str, len, i;
	if (!node) { return ''; }
	switch (node.nodeType) {
		case 1:
			if(node.tagName == 'BR') {
				return '\n';
			} else {
				str = '';
				len = node.childNodes.length;
				for (i = 0; i < len; i++) {
					str += webFXSpellCheckHandler.getInnerText(node.childNodes[i]);
				};
				return str;
			}
			break;
		case 3:
			return node.nodeValue;
			break;
	};
};


webFXSpellCheckHandler.getInnerHTML = function(node) {
	var str, regex, a, c, depth, tagStart, tag, i, len, word, tagEnd, outstr;

	str = node.innerHTML;
	len = str.length;
	outstr = '';

	tagEnd = 0;
	regex =  /<[^>]+webfx\-spellchecker\-word[^>]+>/g;
	while (a = regex.exec(str)) {
		depth = 0;
		for (i = regex.lastIndex; i < len; i++) {
			c = str.substr(i, 1);
			if (c == '<') { tagStart = i; }
			else if (c == '>') {
				tag = str.substr(tagStart, i - tagStart + 1);
				if (
					(tag.substr(tag.length-2, 1) == '/') ||
					(tag.substr(1, 2) == 'br') ||
					(tag.substr(1, 2) == 'hr') ||
					(tag.substr(1, 3) == 'img')
				);
				else if (tag.substr(1, 1) == '/') {
					depth--;
					if (depth == -1) {
						word = str.substr(regex.lastIndex, tagStart - regex.lastIndex);
						if (a[0].match(/font\-weight\: bold/i)) { word = '<strong>' + word + '</strong>'; }
						else if (a[0].match(/font\-style\: italic/i)) { word = '<em>' + word + '</em>'; }
						else if (a[0].match(/text\-decoration\: underline/i)) { word = '<u>' + word + '</u>'; }
						if (tagEnd < (regex.lastIndex - a[0].length)) {
							outstr += str.substr(tagEnd, (regex.lastIndex - a[0].length) - tagEnd);
						}
						outstr += word;
						tagEnd = i+1;
						break;
				}	}
				else { depth++; }
	}	}	}

	if (tagEnd < len) {
		outstr += str.substr(tagEnd, len - tagEnd);
	}

	return outstr;
};

