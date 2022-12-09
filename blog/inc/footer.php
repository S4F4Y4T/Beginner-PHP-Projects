

    <div class="footer-sec template">

        <?php
        $query = "select * from tbl_copy where id='1'";
        $result = $db->select($query);
        if($result){
        while($svalue = $result->fetch_assoc()){
        ?>
          <?= $svalue['copy'] ?>

        <?php }} ?>

    </div> 
     
    </div>

	</body>

</html>	