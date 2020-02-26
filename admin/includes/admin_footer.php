</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<script>
$("#sortable").sortable({
  items: "tbody tr",
  axis: "y"
});
</script>

<style>
#sortable tbody tr{
  cursor:move;
}
</style>

</body>

</html>
