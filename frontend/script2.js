detalis=document.getElementById('detalis-product');


selectedPlant=JSON.parse(localStorage.getItem('selectedPlant'));
console.log(selectedPlant);  // طباعة القيمة قبل الـ JSON.parse
if(selectedPlant){
detalis.innerHTML=
`<div class="row align-items-center justify-content-center ">
                <div class=" col-md-5  text-center">
                    <img src="${selectedPlant.plantName}" alt="Product Image" class="img-fluid">
                </div>
                <div class=" col-md-6 " style="margin-top: 10px; display: grid; gap: 10px; ">
                    <h2 class="product-title" style="font-family: Judson;
                        width: 300px; font-size: 30px;">${selectedPlant.plantName}</h2>
                    <p class="product-price text-success"
                        style="width: 200px; font-size:48px ;color: #28a44c; font-family:Judson ;">20₪</p>


                    <div class="d-flex align-items-center mb-3"
                        style="width: fit-content; border-radius: 15px ; background-color: #f0f0f0;">
                        <button class="btn btn-outline-secondary"
                            style="color: #28a44c; font-size: 12px; border-radius: 30px;">+</button>
                        <input type="number" class="form-control text-center mx-2" value="1"
                            style="width: 60px; border: none;  background-color: #f0f0f0; box-shadow: none;">
                        <button class="btn btn-outline-secondary"
                            style="color: #28a44c; border-radius: 3rem; font-size: 12px;">-</button>
                    </div>

                    <div class="class= mb-3" style="display: flex; gap: 8px;">
                        <button class="btn" id="addToCart" style="background-color: #28a44c; width: 90%; color: white;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                           Add to Cart
                          </button>
                          
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <h1>Shopping Cart</h1>
                              <div class="list-cart" id="carts-list"></div>  
                           <div class="btn">
            <button class="close">CLOSE</button>
            <button class="check-out">CHECK OUT</button>

    </div>
                                   </div>
                                   </div>
                                                                  </div>


                            
                    <!-- التبويبات -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" style="color: black;" id="description-tab"
                                data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab"
                                aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="plantcare-tab" style="color: black;" data-bs-toggle="tab"
                                data-bs-target="#plantcare" type="button" role="tab" aria-controls="plantcare"
                                aria-selected="false">Plant Care</button>
                        </li>
                    </ul>

                    <!-- محتوى التبويبات -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            ${selectedPlant.descreption}
                        </div>
                        <div class="tab-pane fade" id="plantcare" role="tabpanel" aria-labelledby="plantcare-tab">
                            <p>
                            ${selectedPlant.plantCare}

                            </p>
                        </div>
                    </div>


                    <div>

                    </div>
                </div>
            </div>
`;

}

addToCart=document.getElementById('addToCart');
addToCart.onclick= function (){
    let cart = JSON.parse(localStorage.getItem('addToCart')) || [];
    
    cart.push(selectedPlant);

    localStorage.setItem('addToCart',JSON.stringify(cart));
    cartsList = document.getElementById('carts-list');
    for(let i=0;i<data.length;i++){
        cartsList.innerHTML+=
        `<div class="item">
                <div class="image">
                    <img src=" ${data[i].image}">
                </div>
                <div class="name">
                ${data[i].plantName}
                </div>
                <div class="total-price">
                ${data[i].price}
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>1</span>
                    <span class="plus">></span>
                </div>
          
        
        
        `;
    }

        
           
       
                    
                            
     
}
