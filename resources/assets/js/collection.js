window.onload = function()
{
    let table = $('#main-table').DataTable(
        {
            "ajax": "/laravel/shl-collection-analysis/public/json/test_book_data.json",
            "responsive": true,
            "deferRender": true,
            "order":
                [
                    [6, "asc"]
                ],
            "columns":
                [
                    {
                        "data": "cover_url",
                        "render": function(data, type, row)
                        {
                            return '<img src="' + data + '" />';
                        }
                    },
                    {
                        "data":
                            {
                                title: "title",
                                url: "catalog_url",
                                author: "author",
                                pub_date: "pub_date"
                            },
                        "render": function(data, type, row, meta)
                        {
                            if (type === 'display')
                            {
                                data = '<a href="' + data.catalog_url + '" target=\"_blank\">' + data.title + '</a><br>By - ' + data.author + ", " + data.pub_date;
                            }

                            return data;
                        }
                    },
                    {
                        "data": "isbn",
                        "orderable": false
                    },
                    {
                        "defaultContent": "<b>Recorded Checkouts:</b> 0<br><b>Last Checked Out:</b> Never"
                    },
                    {
                        "data":
                            {
                                isbn: "isbn"
                            },
                        "render": function(data, type, row, meta)
                        {
                            if (type === "display")
                            {
                                data = "<button id='retain-button-" + data.isbn + "' class='retain-button' isbn='" + data.isbn + "'>Retain</button>"
                            }

                            return data;
                        }
                    },
                    {
                        "data":
                            {
                                isbn: "isbn"
                            },
                        "render": function(data, type, row, meta)
                        {
                            if (type === "display")
                            {
                                data = "<button id='send-button-" + data.isbn + "' class='send-button' isbn='" + data.isbn + "'>Send</button>"
                            }

                            return data;
                        }
                    },
                    {
                        "data": "title",
                        "visible": false
                    },
                    {
                        "data": "author",
                        "visible": false
                    },
                    {
                        "data": "subjects[, ]",
                        "visible": false
                    }
                ],
            "drawCallback": function(settings)
            {
                let button;
                let buttonFunctions =
                    {
                        "Yes": function()
                        {
                            $(this).dialog("close");
                            let buttonElement = $(button);
                            buttonElement.parent().append(buttonElement.attr("class") == "send-button" ? "<p>Sent to department.</p>" : "<p>Retained in collection.</p>");
                            buttonElement.parent().parent().removeClass("even");
                            buttonElement.parent().parent().removeClass("odd");
                            buttonElement.parent().parent().css("color", "grey");
                            buttonElement.parent().parent().css("background-color", "#bbc2ce");
                            buttonElement.parent().parent().addClass("submitted");
                            $("#retain-button-" + buttonElement.attr("isbn")).css("display", "none");
                            $("#send-button-" + buttonElement.attr("isbn")).css("display", "none");
                            updateSubmittedRows();
                        },
                        "No": function()
                        {
                            $(this).dialog("close");
                        }
                    }

                $(".retain-button").click(function()
                {
                    button = event.target;
                    $("#retain-confirm").dialog(
                        {
                            resizable: false,
                            height: "auto",
                            width: 400,
                            modal: true,
                            buttons: buttonFunctions
                        });
                });

                $(".send-button").click(function()
                {
                    button = event.target;
                    $("#send-confirm").dialog(
                        {
                            resizable: false,
                            height: "auto",
                            width: 400,
                            modal: true,
                            buttons: buttonFunctions
                        });
                });

                updateSubmittedRows();
                function updateSubmittedRows()
                {
                    if ($("#submission-filter").is(":checked"))
                    {
                        $("tr.submitted").hide();
                    }
                    else
                    {
                        $("tr.submitted").show();
                    }
                }
            },
            "initComplete": function()
            {
                let subjectColumn = this.api().column(8);
                let groupSelect = $('<br><select id="group-filter"><option value="">None</option></select>')
                    .appendTo($(".dataTables_length"))
                    .on('change', function()
                    {
                        var val = $.fn.dataTable.util.escapeRegex
                        (
                            $(this).val()
                        );

                        subjectColumn.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                let subjectSelect = $('<br><select id="subject-filter" disabled><option value="">None</option></select>').appendTo($(".dataTables_length"));
                let submissionFilter = $('<br><input type="checkbox" id="submission-filter">Hide/Show Submitted Entries</input>').appendTo($(".dataTables_length"));
                subjectColumn.data().unique().sort().each(function(d, j)
                {
                    var value = d;
                    var name = d;
                    if (name.includes(","))
                    {
                        name = name.substring(name.indexOf(",") + 2);
                    }

                    if (name != "")
                    {
                        groupSelect.append('<option value="' + value + '">' + name + '</option>');
                        subjectSelect.append('<option value="' + value + '">' + name + '</option>');
                    }
                });

                $('#submission-filter').change(function()
                {
                    if (this.checked)
                    {
                        $(".submitted").hide();
                    }
                    else
                    {
                        $(".submitted").show();
                    }
                });

                $('#group-filter').change(function()
                {
                    if ($('#group-filter').find(":selected").text() === "None")
                    {
                        $("#subject-filter").val("");
                        $("#subject-filter").prop("disabled", true);
                    }
                    else
                    {
                        $("#subject-filter").prop("disabled", false);
                    }
                });

                var shouldOrderTitleColumnAsc = false;
                $("#title-column").click(function()
                {
                    table.column(6).order(shouldOrderTitleColumnAsc ? 'asc' : 'desc').draw();
                    shouldOrderTitleColumnAsc = !shouldOrderTitleColumnAsc;
                });
            }
        });
}
