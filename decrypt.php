<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Free SMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!--  bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </head>

  <body>

    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="bi bi-list"></i>
      </label>
      <label class="logo">iTextMo</label>
      <ul>
        <li><a href="index.php">Send SMS</a></li>
        <li><a href="encrypt.php">Encrypt</a></li>
        <li><a class="active" href="decrypt.php">Decrypt</a></li>
      </ul>
    </nav>

    <section>

      <div class="container" style="margin-bottom: 60px;">
        <div class="body col-lg-12">
          <div class="row">
            <div class="col-lg-6" style="margin-top: 30px;">
                
                <div class="form-row">
                  <label for="message">Encrypted Message:</label>
                  <br>
                  <textarea name="message" style="width: 100%;" rows="10" id="message" maxlength="100" required></textarea>
                </div>
                <br>
                <div class="form-row" style="display: flex;">
                  <div class="col-lg-5">
                    <label for="key">Private Key:</label>
                  </div>          
                  <div class="col-lg-7">                
                    <input type="text" name="key" id="key" style="width: 100%;" required>
                  </div>                        
                </div>           
                  <br>
                  <div class="form-row" style="display: flex; justify-content: center;">      
                    <button class="btn btn-primary" name="send" id="sendMsg"><i class="bi bi-send-fill"></i> Decrypt</button>
                    &nbsp;
                    <button class="btn btn-secondary" id="pasteMessage"><i class="bi bi-clipboard"></i> Paste</button>
                  </div>  
               
            </div>
            <div class="col-lg-6" style="margin-top: 30px;margin-bottom: 60px;">
              
                <div class="form-row">
                  <label for="message">Decrypted Message:</label>
                    <br>
                      <textarea name="message" style="width: 100%;" rows="10" id="decrpyted_message" maxlength="100" required disabled></textarea>
                </div>
                <br>
                <br>
                <br>
                  <div class="form-row" style="display: flex; justify-content: center;">        
                    <button class="btn btn-danger" id="clearMessage"><i class="bi bi-eraser"></i> Clear</button>
                  </div>
            </div>
          </div>
       </div>    
      </div>      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
    </section>

    <script type="text/javascript">
      
      
        $('#sendMsg').click(function(){

          var msg = $('#message').val();
          var key = $('#key').val();

          if(msg==''){
            alert("Message is required!");
            $('#message').focus();
            return false;
          }
          else if(key==''){
            alert("Encryption Key is required!");
            $('#key').focus();
            return false;
          }

          $.ajax({
              type: 'POST',
              url: 'php/decrypt.php',
              data: { 
                "decrypt": 1,
                "message": msg,
                "key": key
              },
              success: function (response) {
                $('#decrpyted_message').val(response);
                $('#message').val('');
                $('#key').val('');
              }
          });     
        });
    

        $('#pasteMessage').click(function (){
          
             $('#message').val(window.localStorage.getItem('message'));
        });

        $('#clearMessage').click(function (){
          $('#decrpyted_message').val('');
        });
      

    </script>

  </body>
</html>
