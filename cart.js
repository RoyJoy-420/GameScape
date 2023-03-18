
src="https://code.jquery.com/jquery-3.6.0.min.js"

function callrecalculate(){

    jQuery.ajax({
      url: "component.php?action=recalculate",
      type: "GET",
      success: function(response)
          {
            const number = parseInt(response);
            console.log(number);
            
            $('.total').html('Rs' + number);
          }
  });
  }

  function callupdatequantity(id,quantity){

    $.ajax({
        url: "component.php",
        type: "POST",
        data: {
            id:id,
            quantity: quantity
        },
        success: function(response)
        {
          const number = parseInt(response);
          console.log(number);
          $('.amount').html('Price ('+number+' items)' );
          $('#cart_count').html(number);
        }
      
  });
  }
setupButtonListeners();




function setupButtonListeners() {
    const items= document.querySelectorAll('.cart-items');
    
    items.forEach(item => {
      const handleClick = (event) => {
        const currentItem = event.currentTarget.closest('.quantity');
        const Itemid = currentItem.querySelector('.quantity [name="id"]');
        let id = parseInt(Itemid.value);
        const quantityInput = currentItem.querySelector('.quantity [name="quan"]');
        let quantityValue = parseInt(quantityInput.value);
        quantityValue++;
        $(quantityInput).val(quantityValue);
        callupdatequantity(id,quantityValue)
        console.log(quantityValue);
        callrecalculate();
      };
      
      const buttonplus = item.querySelector('.addbtn');
      buttonplus.addEventListener('click', handleClick);
    });

   
    items.forEach(item => {
        const handleClick = (event) => {
          
            const currentItem = event.currentTarget.closest('.quantity');
            const Itemid = currentItem.querySelector('.quantity [name="id"]');
            let id = parseInt(Itemid.value);
            const quantityInput = currentItem.querySelector('.quantity [name="quan"]');
            let quantityValue = parseInt(quantityInput.value);
            quantityValue--;
            $(quantityInput).val(quantityValue);
            callupdatequantity(id,quantityValue)
            console.log(quantityValue);
            callrecalculate();
            if (quantityValue <=0){
                alert("Product has been Removed...!");
                window.location.href = "cart.php";
            }
        };
        
        const buttonminus = item.querySelector('.minusbtn');
        buttonminus.addEventListener('click', handleClick);
      });
}

 
  