
<?php // Template Name: Master Catalog Data ?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <link rel="stylesheet" href="/wp-content/themes/storefront-child/products/loading-bar.css">


<link rel="stylesheet" href="/wp-content/themes/storefront-child/products/product-style.css">
<!-- Bootstrap Table Stylesheets -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<section style="margin:100px 50px;">
<div id="toolbar" class="select">
  <select class="form-control">
    <option value="">Export Basic</option>
    <option value="all">Export All</option>
    <option value="selected">Export Selected</option>
  </select>
</div>
    <?php include('master-catalog-table.php') ; ?>
</section>


<script>
    let masterTable = document.getElementById('master-catalog-table')

window.addEventListener('load', function () {
  masterTable.style.display="table"
})
</script>

<!-- Bootstrap Table Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script defer src="/wp-content/themes/storefront-child/products/product-helpers.js"></script>

<script type="text/javascript" src="/wp-content/themes/storefront-child/products/tableExport.jquery.plugin-master/libs/FileSaver/FileSaver.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/storefront-child/products/tableExport.jquery.plugin-masterlibs/js-xlsx/xlsx.core.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/storefront-child/products/tableExport.jquery.plugin-master/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script>
  var $table = $('#table')

  $(function() {
    $('#toolbar').find('select').change(function () {
      $table.bootstrapTable('destroy').bootstrapTable({
        exportDataType: $(this).val(),
        exportTypes: ['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf'],
        columns: [
          {
            field: 'state',
            checkbox: true,
            visible: $(this).val() === 'selected'
          },
          {
            field: 'id',
            title: 'ID'
          }, {
            field: 'name',
            title: 'Item Name'
          }, {
            field: 'price',
            title: 'Item Price'
          }
        ]
      })
    }).trigger('change')
  })
</script>