<script>

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {
  pageSetUp();
  // menu
  $("#menu").menu();

  /*
   * AUTO COMPLETE AJAX
   */
  function log(message) {
    $("<div>").text(message).prependTo("#log");
    $("#log").scrollTop(0);
  }

  $("#city").autocomplete({
    source : function(request, response) {
      $.ajax({
        url : "http://ws.geonames.org/searchJSON",
        dataType : "jsonp",
        data : {
          featureClass : "P",
          style : "full",
          maxRows : 12,
          name_startsWith : request.term
        },
        success : function(data) {
          response($.map(data.geonames, function(item) {
            return {
              label : item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
              value : item.name
            }
          }));
        }
      });
    },
    minLength : 2,
    select : function(event, ui) {
      log(ui.item ? "Selected: " + ui.item.label : "Nothing selected, input was " + this.value);
    }
  });
  /*
   * Spinners
   */
  $("#spinner").spinner();
  $("#spinner-decimal").spinner({
    step : 0.01,
    numberFormat : "n"
  });

  $("#spinner-currency").spinner({
    min : 5,
    max : 2500,
    step : 25,
    start : 1000,
    numberFormat : "C"
  });
  /*
   * CONVERT DIALOG TITLE TO HTML
   * REF: http://stackoverflow.com/questions/14488774/using-html-in-a-dialogs-title-in-jquery-ui-1-10
   */
  $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
    _title : function(title) {
      if (!this.options.title) {
        title.html("&#160;");
      } else {
        title.html(this.options.title);
      }
    }
  }));
  /*
  * DIALOG SIMPLE
  */
  // Dialog click
  $('#dialog_link').click(function() {
    $('#dialog_simple').dialog('open');
    return false;
  });

  $('#dialog_simple').dialog({
    autoOpen : false,
    width : 600,
    resizable : false,
    modal : true,
    title : "<div class='widget-header'><h4><i class='fa fa-warning'></i> Empty the recycle bin?</h4></div>",
    buttons : [{
      html : "<i class='fa fa-trash-o'></i>&nbsp; Delete all items",
      "class" : "btn btn-danger",
      click : function() {
        $(this).dialog("close");
      }
    }, {
      html : "<i class='fa fa-times'></i>&nbsp; Cancel",
      "class" : "btn btn-default",
      click : function() {
        $(this).dialog("close");
      }
    }]
  });
  /*
  * DIALOG HEADER ICON
  */
  // Modal Link
  $('#modal_link').click(function() {
    $('#dialog-message').dialog('open');
    return false;
  });

  $("#dialog-message").dialog({
    autoOpen : false,
    modal : true,
    title : "<div class='widget-header'><h4><i class='icon-ok'></i> jQuery UI Dialog</h4></div>",
    buttons : [{
      html : "Cancel",
      "class" : "btn btn-default",
      click : function() {
        $(this).dialog("close");
      }
    }, {
      html : "<i class='fa fa-check'></i>&nbsp; OK",
      "class" : "btn btn-primary",
      click : function() {
        $(this).dialog("close");
      }
    }]
  });
  /*
   * Remove focus from buttons
   */
  $('.ui-dialog :button').blur();
  /*
   * Just Tabs
   */
  $('#tabs').tabs();
  /*
   *  Simple tabs adding and removing
   */
  $('#tabs2').tabs();
  // Dynamic tabs
  var tabTitle = $("#tab_title"), tabContent = $("#tab_content"), tabTemplate = "<li style='position:relative;'> <span class='air air-top-left delete-tab' style='top:7px; left:7px;'><button class='btn btn-xs font-xs btn-default hover-transparent'><i class='fa fa-times'></i></button></span></span><a href='#{href}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; #{label}</a></li>", tabCounter = 2;
  var tabs = $("#tabs2").tabs();
  // modal dialog init: custom buttons and a "close" callback reseting the form inside
  var dialog = $("#addtab").dialog({
    autoOpen : false,
    width : 600,
    resizable : false,
    modal : true,
    buttons : [{
      html : "<i class='fa fa-times'></i>&nbsp; Cancel",
      "class" : "btn btn-default",
      click : function() {
        $(this).dialog("close");
      }
    }, {
      html : "<i class='fa fa-plus'></i>&nbsp; Add",
      "class" : "btn btn-danger",
      click : function() {
        addTab();
        $(this).dialog("close");
      }
    }]
  });
  // addTab form: calls addTab function on submit and closes the dialog
  var form = dialog.find("form").submit(function(event) {
    addTab();
    dialog.dialog("close");
    event.preventDefault();
  });
  // actual addTab function: adds new tab using the input from the form above
  function addTab() {
    var label = tabTitle.val() || "Tab " + tabCounter, id = "tabs-" + tabCounter, li = $(tabTemplate.replace(/#\{href\}/g, "#" + id).replace(/#\{label\}/g, label)), tabContentHtml = tabContent.val() || "Tab " + tabCounter + " content.";

    tabs.find(".ui-tabs-nav").append(li);
    tabs.append("<div id='" + id + "'><p>" + tabContentHtml + "</p></div>");
    tabs.tabs("refresh");
    tabCounter++;
    // clear fields
    $("#tab_title").val("");
    $("#tab_content").val("");
  }
  // addTab button: just opens the dialog
  $("#add_tab").button().click(function() {
    dialog.dialog("open");
  });
  // close icon: removing the tab on click
  $("#tabs2").on("click", 'span.delete-tab', function() {
    var panelId = $(this).closest("li").remove().attr("aria-controls");
    $("#" + panelId).remove();
    tabs.tabs("refresh");
  });
  /*
  * ACCORDION
  */
  //jquery accordion
     var accordionIcons = {
         header: "fa fa-plus",    // custom icon class
         activeHeader: "fa fa-minus" // custom icon class
     };
  $("#accordion").accordion({
    autoHeight : false,
    heightStyle : "content",
    collapsible : true,
    animate : 300,
    icons: accordionIcons,
    header : "h4",
  })
  /*
   * PROGRESS BAR
   */
  $("#progressbar").progressbar({
      value: 25,
      create: function( event, ui ) {
        $(this).removeClass("ui-corner-all").addClass('progress').find(">:first-child").removeClass("ui-corner-left").addClass('progress-bar progress-bar-success');
    }
  });
})
</script>
