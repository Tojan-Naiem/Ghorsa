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
                        <button class="btn" style="background-color: #28a44c; width: 90%; color: white;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                           Add to Cart
                          </button>
                          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <h1>Shopping Cart</h1>
        <div class="list-cart">
            <div class="item">
                <div class="image">
                    <img src="img/outdoorPlants.png">
                </div>
                <div class="title">
                    Name
                </div>
                <div class="total-price">
                    200
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>1</span>
                    <span class="plus">></span>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="img/outdoorPlants.png">
                </div>
                <div class="title">
                    Name
                </div>
                <div class="total-price">
                    200
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>1</span>
                    <span class="plus">></span>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="img/outdoorPlants.png">
                </div>
                <div class="title">
                    Name
                </div>
                <div class="total-price">
                    200
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>1</span>
                    <span class="plus">></span>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="img/outdoorPlants.png">
                </div>
                <div class="title">
                    Name
                </div>
                <div class="total-price">
                    200
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>1</span>
                    <span class="plus">></span>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="img/outdoorPlants.png">
                </div>
                <div class="title">
                    Name
                </div>
                <div class="total-price">
                    200
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>1</span>
                    <span class="plus">></span>
                </div>
            </div>
            
        </div>
        <div class="btn">
            <button class="close">CLOSE</button>
            <button class="check-out">CHECK OUT</button>

        </div>
                              <!-- <div>
                                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                              </div>
                              <div class="dropdown mt-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                  Dropdown button
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <li><a class="dropdown-item" href="#">Action</a></li>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                              </div> -->
                            </div>
                          </div>
                    
                             <button href="" class="fa-regular fa-heart"
                            style="text-decoration: none; color:#28a44c ; font-size: 25px; margin-top: 5px;"></button>


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