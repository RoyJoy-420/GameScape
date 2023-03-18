    var sortBy,filter;
    const dropdowns = document.querySelectorAll('.dropdown');                   
    dropdowns.forEach(dropdown =>{
        const select=dropdown.querySelector('.select');
        const caret=dropdown.querySelector('.caret');
        const menu=dropdown.querySelector('.menu');
        const options=dropdown.querySelectorAll('.menu li');
        const selected=dropdown.querySelector('.selected');
        sortBy = 'Price DESC';                   
        select.addEventListener('click',()=>{
            select.classList.toggle('select-clicked');
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-open');
        });
        options.forEach(option=>{
            option.addEventListener('click',()=>{
                selected.innerText=option.innerText;
                select.classList.remove('select-clicked');
                select.classList.remove('caret-rotate');
                select.classList.remove('menu-open');

                let sort = selected.innerText;
                if (sort == 'Ascending Price') {
                    sortBy = 'Price ASC';
                } else if (sort == 'A-Z') {
                    sortBy = 'Name ASC';
                } else if (sort == 'Z-A') {
                    sortBy = 'Name DESC';
                }else{sortBy = 'Price DESC';}
                callfilter(filter,sortBy);
                options.forEach(option=>{
                    option.classList.remove("active");
                });
                options.classList.add('active');
            });
        });
    }); 

    const dropdowns2 = document.querySelectorAll('.dropdown2');                   
    dropdowns2.forEach(dropdown2 =>{
        const select=dropdown2.querySelector('.select');
        const caret=dropdown2.querySelector('.caret');
        const menu=dropdown2.querySelector('.menu');
        const options=dropdown2.querySelectorAll('.menu li');
        const selected=dropdown2.querySelector('.selected');
        filter = 'All';                       
        select.addEventListener('click',()=>{
            select.classList.toggle('select-clicked');
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-open');
        });
        options.forEach(option=>{
            option.addEventListener('click',()=>{
                selected.innerText=option.innerText;
                select.classList.remove('select-clicked');
                select.classList.remove('caret-rotate');
                select.classList.remove('menu-open');
                filter = selected.innerText;
                callfilter(filter,sortBy);
                options.forEach(option=>{
                    option.classList.remove("active");
                });
                options.classList.add('active');
            });
        });
    }); 
    setupButtonListeners();
    src="https://code.jquery.com/jquery-3.6.0.min.js"

    function callfilter(filter,sortBy){
      $.ajax({
        url: "Keyboardgrid.php?action=filtering&filter="+filter+"&sortOrder="+sortBy,
        type: "GET",
        
        success: function(response) 
          {
            $('.product-items').html(response);
            console.log(response);
            setupButtonListeners();
          }
    
    });
    }
    function setupButtonListeners() {
      const carts = document.querySelectorAll('.product-btns');
      
      carts.forEach(cart => {
        const handleClick = (event) => {
          const button = event.currentTarget;
          const Item = button.closest('.product-btns').querySelector('[name="product_id"]');
          const id = Item.value;
          console.log(id);
          callpost(id);
        };
        
        const button = cart.querySelector('.btn-cart');
        button.addEventListener('click', handleClick);
    });
  }
  function callpost(id){
    $.ajax({
      url: "Keyboardgrid.php",
      type: "POST",
      data: {
        id: id
      },
      success: function(response)
          {
            
            if(+response){
              $('.count').html(response);
            }else{
              console.log("bnjr");
            }
          }
  });
  }

   
                    
                   