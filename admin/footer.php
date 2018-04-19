  </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/graph.min.js"></script>
    <script type="text/javascript">
      function del_confirm(){
        if(!confirm('Are You Sure To Delete It?')){
          return false;
        }
      }
      CKEDITOR.replace( 'content' );
    </script>
    <script>
      $(document).ready(function(){
        $('#forEbay').on('change',function(){
          if($(this).val()==2){
            $('.for-ebay').css('display','block');
          }
          else{
            $('.for-ebay').css('display','none');
          }
        });
        $('#add_pro').click(function(){
          $('.add-here').append('<label class="control-label">Label</label><input type="text" name="label[]" class="form-control">');
        });
        $('#addMoreGraphVal').click(function() {
           $('.add_more_year').append('<label for="graph_value">Enter Year</label><input type="text" class="form-control" name="graph_year[]" placeholder="2017"><label for="graph_value">According To Month Or Year</label><input type="text" class="form-control" name="graph_values[]" id="graph_value" placeholder="120 | 200 | 250 | 220">');
        });
        $('#search-field').on('keyup',function(){
          var search_term=$(this).val();
          if(search_term!=''){
            $.ajax({
              method: 'POST',
              url: 'search_suggestion.php',
              data: 'search_term='+search_term,
              dataType: 'html',
              success: function(data){
                $('.search_result').html(data).css({'display':'inherit'});
              },
              error: function(){
                alert('Something Wrong');
              }
            });
          }
          else{
            $('.search_result').css({'display':'none'});
          }
        });
        $('.search_result').on('click','ul li',function(){
          var search_term=$(this).text();
          $('#search-field').val(search_term);
          $('.search_result').css({'display':'none'});
          $.ajax({
            method: 'POST',
            url: 'search_result.php',
            data: 'search_term='+search_term,
            dataType: 'html',
            success: function(data){
              $('#search_result').replaceWith(data);
              console.log(data);
            },
            error: function(){
              alert('Some Thing Wrong');
            }
          });
        });
        $('label.ckeckbox input#top-three').click(function(){
          if($(this).is(':checked')){
            $('.graph-val').css({'display':'block'});
          }
          else{
            $('.graph-val').removeAttr('id').css({'display':'none'});
          }
        });
        $('#product_submit').click(function(){
          if($('#cat').val()==''){
            $('.cat').html('<div class="text-danger">Please Select A Category First</div>');
            return false;
          }
          if($('#p_title').val()==''){
            $('.p_title').html('<div class="text-danger">Please Enter Product Title</div>');
            return false;
          }
          if($('#p_desc').val()==''){
            $('.p_title').html('<div class="text-danger">Please Enter Product Desctription</div>');
            return false;
          }
          var graph_val=$('#graph_value').val();
          if($('label.ckeckbox input').is(':checked') && graph_val==''){
            $('#graph_val_error').html('<div class="text-danger">Please Enter Graph values</div>');
            return false;
          }
        });
        $('#cat').on('change',function(){
          var cat=$(this).val();
          var p_id=$('#p_id').val();
          $.ajax({
            url: 'get_label.php',
            method: 'post',
            data: 'cat='+cat+'&pid='+p_id,
            dataType: 'html',
            success: function(data){
              $('.add-labels').html(data);
            },
            error: function(){
              alert('Something wrong');
            }
          });
        });
        $('#cat_for_top_three').on('change',function(){
          var prop1=new Array();
          var prop2=new Array();
          var prop3=new Array();
          var cat_id=$(this).val();
          $.ajax({
            method: 'POST',
            url: 'fetch_top_three.php',
            data: 'cat_id='+cat_id,
            tataType: 'json',
            success: function(data){

              var obj=JSON.parse(data);
              if(obj.error){
                $('#top_three').html('<h4>'+obj.error+'</h4>');
              }
              else{
                var html='<br><table class="table table-hovered"><thead>';
                html+='<tr><td>Features</td><td>'+obj.p_title[0]+'</td>';
                if(obj.p_title[1]===undefined){
                  html+='<td>None</td>';
                }else{
                  html+='<td>'+obj.p_title[1]+'</td>';
                }
                if(obj.p_title[2]===undefined){
                  html+='<td>None</td>';
                }else{
                  html+='<td>'+obj.p_title[2]+'</td>';
                }
                html+='</td></tr>';

                var labels=obj.label;
                var propOne=obj.property[0];
                var propTwo=obj.property[1];
                var propThree=obj.property[2];
                var price=obj.p_price;
                prop1=propOne.split('@|@');
                prop2=propTwo.split('@|@');
                prop3=propThree.split('@|@');
                label=labels[0].split("@|@");
                for(var i=0;i<label.length-1;i++){
                  
                  html+='<tr><td>'+label[i]+'</td><td>'+prop1[i]+'</td>';
                  if(prop2[i]===undefined){
                    prop2[i]='<td>-</td>';
                  }
                  else{
                    html+='<td>'+prop2[i]+'</td>';
                  }
                  if(prop3[i]===undefined){
                    prop3[i]='<td>-</td>';
                  }
                  else{
                    html+='<td>'+prop3[i]+'</td>';
                  }

                }
                html+='<tr><td>Price</td><td>$'+price[0]+'</td><td>$'+price[1]+'</td><td>$'+price[2]+'</td></tr>';
                html+='</thead></table>';
              }
              $('#top_three').html(html);
            },
            error: function(){
              alert('Something Wrong');
            }
          });
        });
      });
    </script>
  </body>
</html>