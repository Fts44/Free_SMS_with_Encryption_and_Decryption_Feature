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

    <nav style="width: 100%">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="bi bi-list"></i>
      </label>
      <label class="logo">iTextMo</label>
      <ul>
        <li><a class="active" href="index.php">Send SMS</a></li>
        <li><a href="encrypt.php">Encrypt</a></li>
        <li><a href="decrypt.php">Decrypt</a></li>
      </ul>
    </nav>

    <section >

      <div class="container col-lg-12">
        <div class="col-lg-6" style="margin-top: 30px; margin-bottom: 60px;">
          <div class="col-lg-12">
              <div class="form-row" style="display: flex;">
                <div class="col-lg-5">
                  <label for="receiver">Receiver's Number:</label>
                </div>
                <div class="col-lg-7"> 
                  <input type="Number" name="receiver" id="receiver" style="width: 100%;" placeholder="ex: 09123456789">
                </div>
              </div>
            <br>
              <div class="form-row">
                <label for="message">Message: (Max 100 Characters)</label>
            <br>
                <textarea name="message" style="width: 100%;" rows="10" id="message" maxlength="100"></textarea>
              </div>
            <br>
              <div class="form-row" style="display: flex;">
                <div class="col-lg-5">
                  <label for="key">Private Key:</label>
                </div>          
                <div class="col-lg-7">                
                  <input type="text" name="key" id="key" style="width: 100%;">
                </div>                        
              </div>           
            <br>
              <div class="form-row" style="display: flex; justify-content: center;">        
                <button class="btn btn-primary" type="submit" name="send" id="sendMsg" onclick="sendMsg()"><i class="bi bi-send-fill"></i> Send</button>
              </div>
          </div>   
        </div>    
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
    </section>

    <script type="text/javascript">
      
      function sendMsg(){

        var receiver = $('#receiver').val();
        var msg = $('#message').val();
        var key = $('#key').val();

        let isExecuted = confirm('Send Meesage to '+receiver+' with the Encryption Key of '+key);

          if(isExecuted){
              $.ajax(
              {
                type: 'POST',
                url: 'php/smsAPI.php',
                data: { 
                  "send": 1,
                  "receiver": receiver,
                  "message": msg,
                  "key": key
                },
                success: function (response) {
                  alert(response);
                  history.go(0);
                }
              }
            );     
          }
      }

    </script>

  </body>
</html>
