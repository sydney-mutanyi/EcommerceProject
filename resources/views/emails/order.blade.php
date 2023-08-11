
<!DOCTYPE html>
<html>
<head>
<style>
.button {
  background-color: #0D7AA0;;
  border: none;
  color: white;
  /* //D9D9D9 */
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.head_tag {
  background-color: #0D7AA0;
  border: none;
  color: white;
  padding: 15px 20px;
}
.body_tag {
  background-color: #BACBD0;
  padding: 15px 20px;
}
.card{
  background-color: white;
  padding: 15px 20px;
}
.htext{
  font-size: 16px;
color: #0D7AA0;

}
.a{
  color: white;
}

hr.new2 {
  border-top: 1px dashed black;
}
</style>
</head>
<body>

  <div class="container">
    <div class="head_tag">
      <h2>Online Order Receipt Data</h2>
    </div>
    <div class="body_tag">
      <div class="card">
        <h3>CLIENT ORDER DETAILS  </h3>

        <div class="htext">
         
          <h5>Full Names: <b> {{ $data['name']}} </b> <h5>

          <h5>Phone Number: <b> {{ $data['contact']}} </b> <h5>
          <h5>Delivery Location: <b> {{ $data['location']}} </b> <h5>

          <h5>Transport: <b> {{ $data['transport']}} </b> <h5>
            <h5>Delivery Location: <b> {{ $data['location']}} </b> <h5>

            <h5>Subtotal: Ksh<b> {{ $data['subtotal']}} </b> <h5>
                <h5>Total Cost: Ksh<b> {{ $data['total']}} </b> <h5>

                    <p>Thanks for your purchase of our products</p>




        

                    <hr class="new2">
        </div>

     








      </div>
    </div>


  </div>


</body>
</html>
