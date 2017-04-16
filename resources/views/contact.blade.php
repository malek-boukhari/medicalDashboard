<!DOCTYPE html>
<html>
<head>
    <style>
        #jqxDropdownList{
            margin-top: 40px;
            margin-bottom: 20px;
            margin-left: 20px;
        }
        #jqxPatientGrid{
            margin-bottom: 20px;
            margin-left: 50px;
        }
        #jqxGridDetails{
            margin-left: 800px;
        }
    </style>
    <link rel="stylesheet" href="../../jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="../../jqwidgets/styles/jqx.energyblue.css" type="text/css" />
    <link rel="stylesheet" href="../../jqwidgets/styles/jqx.darkblue.css" type="text/css" />
    <script type="text/javascript" src="../../jquery.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.columnsresize.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.grouping.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.edit.js"></script>

    <script>
    $(document).ready(function () {
        createDropdownList();
        createGridDetails();
        createPatientGrid();
    })
    function createDropdownList() {
        var source = [
            "Instant coffee",
            "Irish coffee",
            "Liqueur coffee"
        ];
        $("#jqxDropdownList").jqxDropDownList({ source: source, selectedIndex: 0, width: '200px',filterable: true,
            height: '25px', theme:'darkblue' });

    }
    function createGridDetails() {
        var DataItem = [
            {"Name and Last Name":"1", "Adress":"dataname1","Cell":"dataname3" },
            {"Name and Last Name":"2", "Adress":"dataname2","Cell":"dataname3" },
        ];
        var source1 =
            {
                datatype: "json",
                datafields: [
                    { name: 'Name and Last Name', type: 'string' },
                    { name: 'Adress', type: 'string' },
                    { name: 'Cell',type: 'String' }
                ],
                id: 'dataID',
                localdata: DataItem
            };

        var dataAdapter1 = new $.jqx.dataAdapter(source1);

        $("#jqxGridDetails").jqxGrid(
            {
                //width: 850,
                autoHeight: true,
                source: dataAdapter1,
                columnsresize: true,
                editable:true,
                theme:'darkblue',
                everpresentrowposition: 'bottom',
                showeverpresentrow: true,
                columns: [
                    { text: 'Name and Last Name', datafield: 'DataID', width: '30%', editable:false },
                    { text: 'Adress', datafield: 'DataAdress'/*, width: 250*/ },
                    { text: 'Cell', datafield: 'DataCell'  }
                ]
            });
    }
    function createPatientGrid () {
        var data = new Array();
        var firstNames =
            [
                "Andrew", "Nancy", "Shelley", "Regina", "Yoshi", "Antoni", "Mayumi", "Ian", "Peter", "Lars", "Petra", "Martin", "Sven", "Elio", "Beate", "Cheryl", "Michael", "Guylene"
            ];
        var lastNames =
            [
                "Fuller", "Davolio", "Burke", "Murphy", "Nagase", "Saavedra", "Ohno", "Devling", "Wilson", "Peterson", "Winkler", "Bein", "Petersen", "Rossi", "Vileid", "Saylor", "Bjorn", "Nodier"
            ];
        var productNames =
            [
                "Black Tea", "Green Tea", "Caffe Espresso", "Doubleshot Espresso", "Caffe Latte", "White Chocolate Mocha", "Cramel Latte", "Caffe Americano", "Cappuccino", "Espresso Truffle", "Espresso con Panna", "Peppermint Mocha Twist"
            ];
        var priceValues =
            [
                "2.25", "1.5", "3.0", "3.3", "4.5", "3.6", "3.8", "2.5", "5.0", "1.75", "3.25", "4.0"
            ];
        for (var i = 0; i < 100; i++) {
            var row = {};
            var productindex = Math.floor(Math.random() * productNames.length);
            var price = parseFloat(priceValues[productindex]);
            var quantity = 1 + Math.round(Math.random() * 10);
            row["firstname"] = firstNames[Math.floor(Math.random() * firstNames.length)];
            row["lastname"] = lastNames[Math.floor(Math.random() * lastNames.length)];
            row["productname"] = productNames[productindex];
            row["price"] = price;
            row["quantity"] = quantity;
            row["total"] = price * quantity;
            data[i] = row;
        }
        var source =
            {
                localdata: data,
                datatype: "array"
            };
        var dataAdapter = new $.jqx.dataAdapter(source, {
            loadComplete: function (data) {
            },
            loadError: function (xhr, status, error) {
            }
        });
        $("#jqxPatientGrid").jqxGrid(
            {
                source: dataAdapter,
                theme:'darkblue',
                editable:true,
                width:'44.1%',
                columns: [
                    {text: 'First Name', datafield: 'firstname', width: 100},
                    {text: 'Last Name', datafield: 'lastname', width: 100},
                    {text: 'Product', datafield: 'productname', width: 180},
                    {text: 'Quantity', datafield: 'quantity', width: 80, cellsalign: 'right'},
                    {text: 'Unit Price', datafield: 'price', width: 90, cellsalign: 'right', cellsformat: 'c2'},
                    {text: 'Total', datafield: 'total', width: 100, cellsalign: 'right', cellsformat: 'c2'}
                ]
            });
    
    }
</script>
</head>
<body>
<div id='jqxDropdownList'>
</div>
<div id="jqxGridDetails">
</div>
<div id="jqxPatientGrid">
</div>
</body>
</html>
