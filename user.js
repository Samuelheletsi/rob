 // Fetch product data from the PHP script
 fetch('user_view_products.php')
 .then(response => response.json())
 .then(data => {
     const productsDiv = document.querySelector('.product-hp');
     data.forEach(product => {
         const productDiv = document.createElement('div');
         productDiv.classList.add('product');
         productDiv.innerHTML = `

         <div class="col">
         <div class="box_main">
            <h4 class="shirt_text">${product.name}</h4>
            <p class="price_text">Start Price  <span style="color: #262626;">${product.price}</span></p>
            <div class="electronic_img"><img src="${product.image_path}" alt="${product.name}" class="product-image"></div>
               <div class="sped">
                    <div class="wd">${product.specification}</div>
                    <div class="wd">${product.description}</div>
                <div>
            <div class="btn_main">
               <div class="buy_bt"><a href="#">Buy Now</a></div>
               <div class="seemore_bt"><a href="#">See More</a></div>
            </div>
         </div>
        </div>



         `;
         productsDiv.appendChild(productDiv);
     });
 });

 fetch('user_dell_products.php')
 .then(response => response.json())
 .then(data => {
     const productsDiv = document.querySelector('.product-dell');
     data.forEach(product => {
         const productDiv = document.createElement('div');
         productDiv.classList.add('product');
         productDiv.innerHTML = `

         <div class="col">
         <div class="box_main">
            <h4 class="shirt_text">${product.name}</h4>
            <p class="price_text">Start Price  <span style="color: #262626;">${product.price}</span></p>
            <div class="electronic_img"><img src="${product.image_path}" alt="${product.name}" class="product-image"></div>
               <div class="sped">
                    <div class="wd">${product.specification}</div>
                    <div class="wd">${product.description}</div>
                <div>
            <div class="btn_main">
               <div class="buy_bt"><a href="#">Buy Now</a></div>
               <div class="seemore_bt"><a href="#">See More</a></div>
            </div>
         </div>
        </div>



         `;
         productsDiv.appendChild(productDiv);
     });
 });

 fetch('user_lonovo_products.php')
 .then(response => response.json())
 .then(data => {
     const productsDiv = document.querySelector('.product-lonovo');
     data.forEach(product => {
         const productDiv = document.createElement('div');
         productDiv.classList.add('product');
         productDiv.innerHTML = `

         <div class="col">
         <div class="box_main">
            <h4 class="shirt_text">${product.name}</h4>
            <p class="price_text">Start Price  <span style="color: #262626;">${product.price}</span></p>
            <div class="electronic_img"><img src="${product.image_path}" alt="${product.name}" class="product-image"></div>
               <div class="sped">
                    <div class="wd">${product.specification}</div>
                    <div class="wd">${product.description}</div>
                <div>
            <div class="btn_main">
               <div class="buy_bt"><a href="#">Buy Now</a></div>
               <div class="seemore_bt"><a href="#">See More</a></div>
            </div>
         </div>
        </div>



         `;
         productsDiv.appendChild(productDiv);
     });
 });


 