<x-app-layout>
    <head>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }

            .dashboard {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 20px;
                padding: 30px;
            }

            .dashboard-item {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
            }
            .dashboard-item:hover{
                background-color: #f5f5f5;
            }

            .dashboard-item h2 {
                font-size: 18px;
                margin-top: 0;
                color: #333;
            }

            .dashboard-item p {
                font-size: 24px;
                font-weight: 500;
                color: #4CAF50;
                margin-bottom: 0;
            }

            .earnings-overview {
                grid-column: 1 / span 3;
                height: auto;
            }

            .revenue-sources {
                height: auto;
            }
        </style>
    </head>

    <body>
        <div class="dashboard">
            <div class="dashboard-item">
                <h2>PRODUCT</h2>
                <p>1000 type</p>
            </div>
            <div class="dashboard-item">
                <h2>ALL SHOP</h2>
                <p>50 store</p>
            </div>
            <div class="dashboard-item">
                <h2>USER</h2>
                <p>50K</p>
            </div>
            <div class="dashboard-item">
                <h2>CUSTOMER</h2>
                <p>70%</p>
            </div>
            <div class="earnings-overview dashboard-item">
                <h2 class="mb-3 text-bold">All Users</h2>
                <div>
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                        <div class="container">
                            <div class="bg-white shadow-md rounded pt-2">
                                <table>
                                    <tbody id="user-table-body">
                                        <tr>
                                            <th
                                                class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Profile
                                            </th>
                                            <th
                                                class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                <script>
                                    fetch('http://127.0.0.1:8000/api/users')
                                        .then(response => response.json())
                                        .then(data => {
                                            const userTableBody = document.getElementById('user-table-body');
                                            data.forEach(user => {
                                                const row = document.createElement('tr');
                                                const defaultProfileImages = [
                                                    'https://cdn-icons-png.flaticon.com/512/3135/3135715.png',
                                                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8qeuBRc8s0nonMN3hbzw1CJue5wg50_ABO8LMOpVrWzIiTPfNvy5qWAYmKIPMETwcyoU&usqp=CAU',
                                                    'https://cdn-icons-png.freepik.com/512/3135/3135789.png',
                                                    'https://cdn-icons-png.flaticon.com/512/6833/6833605.png',
                                                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwsiRJRJVZsNbhMQvW5_jHqApzmQwPrGBvOqCg6CLWtvmvDYJUcpkzGeoXXs8Lmv-NMs4&usqp=CAU'
                                                ];

                                                row.classList.add('hover:bg-grey-lighter');

                                                const profileCell = document.createElement('td');
                                                profileCell.classList.add('py-4', 'px-6');
                                                if (user.profile && user.profile.trim() !== '') {
                                                    profileCell.innerHTML = `<img src="${user.profile}" alt="Default profile image" style="width: 40px; height: 40px; border-radius: 50%;">`;
                                                } else {
                                                    const randomIndex = Math.floor(Math.random() * defaultProfileImages.length);
                                                    const randomDefaultImage = defaultProfileImages[randomIndex];
                                                    profileCell.innerHTML =
                                                        `<img src="${randomDefaultImage}" alt="Default profile image" class="w-12 h-12 rounded-full" style="width: 40px; height: 40px; border-radius: 50%;">`;
                                                }

                                                const name = document.createElement('td');
                                                name.classList.add('py-4', 'px-6');
                                                name.textContent = user.first_name + ' ' + user.last_name;

                                                const emailCell = document.createElement('td');
                                                emailCell.classList.add('py-4', 'px-6');
                                                emailCell.textContent = user.email;

                                                row.appendChild(profileCell);
                                                row.appendChild(name);
                                                row.appendChild(emailCell);
                                                userTableBody.appendChild(row);
                                            });
                                        });
                                </script>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <div class="revenue-sources dashboard-item">
                <h2>Our Shop</h2>
                <div id="shop">
                </div>
                <script>
                    fetch('http://127.0.0.1:8000/api/shop')
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            data.data.forEach(user => {
                                const shopElement = document.getElementById('shop');
                                shopElement.classList.add('py-4', 'px-2');
                                shopElement.innerHTML += `<h3>${user.id}  ${user.name}</h3>`;
                            });
                        });
                </script>
            </div>
        </div>
    </body>
</x-app-layout>
