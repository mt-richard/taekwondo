
<?php include '../../includes/header.php'; ?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <!-- user page content -->
    <main class="w-full px-5 xl:px-20 bg-gray-100 ">
        <h2 class="text-xl py-2 md:py-10">Dashboard / Clubs</h2>

        <div class="text-gray-900 tracking-wider leading-normal">

            <div class="container w-full mx-auto xl:px-2">

                <!-- add user -->

                    <div class="md:py-5"> 
                        <button onclick="openModal()" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="openModalBtn" class="block text-white bg-blue-400 hover:bg-blue-600   font-medium rounded-lg text-sm px-10 py-2.5 text-center " type="button">
                            Add club
                        </button>
                    </div>
                
                    
                    <!-- Main modal -->
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            
                            $name = $_POST['name'];
                            $master = $_POST['master'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            $photo = $_FILES['photo'];
                            
                            $userData = [
                                "name" => $name,
                                "master" => $master,
                                "phone" => $phone,
                                "address" => $address,
                            ];

                            $photoName = $photo['name'];
                            $photoTmpName = $photo['tmp_name'];
                            $photoError = $photo['error'];

                            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                            $uploadedExtension = strtolower(pathinfo($photoName, PATHINFO_EXTENSION));

                            if (!in_array($uploadedExtension, $allowedExtensions)) {
                                $response = "Invalid image format. Allowed formats: JPG, JPEG, PNG, GIF.";
                            } elseif ($photoError === UPLOAD_ERR_OK) {
                                $uniqueFilename = date('YmdHis') . '_' . uniqid() . '-' .$photoName;
                                    $targetDirectory =  '../../upload/' ;
                                    $targetPath = $targetDirectory . $uniqueFilename;
                                
                                if (move_uploaded_file($photoTmpName, $targetPath)) {
                                    $userData["photo"] = $targetPath;
                                    
                                    $result = $db->save("clubs", $userData);
                                    
                                    if ($result['status'] == 'success') {
                                        $response = $result['message'];
                                    } else {
                                        $response = "Failed to add Clubs. avoid Duplications.";
                                    }
                                } else {
                            $response = "Failed to move uploaded file. Error: " . $_FILES['photo']['error'];
                        }
                            } else {
                                $response = "Error uploading the file.";
                            }

                            $message = json_encode($response);
                            // echo json_encode($result);
                            echo "<script>alert('$message'); window.history.pushState({}, '', 'clubs'); window.location.reload();</script>";
                        }
                        ?>



                    <section  id="overlay"  class="bg-gray-700 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 md:inset-0 h-[calc(100%)] max-h-full flex flex-col justify-center items-center min-h-screen antialiased bg-gray-100 bg-gray-100 min-w-screen">
                        <div class="container px-0 mx-auto sm:px-5 bg-white p-5 md:w-3/5 lg:w-1/3 rounded-lg shadow-lg md:mt-20">
                            <div class="md:w-full pb-5">
                                <div class="w-full justify-center">
                                    <span onclick="closeModal()" class="text-2xl cursor-pointer rounded-full p-2 w-5 h-5">&times;</span>
                                </div>
                                <div class="py-5 flex justify-center items-cenetr">
                                    <h2 class="text-2xl font-bold text-gray-600">Add Club Here</h2>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Club's Name : </label>
                                        <input type="text" required name="name" placeholder="Enter Name" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Master's Name : </label>
                                        <input type="text" required name="master" placeholder="Enter Master's name" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Club's Phone : </label>
                                        <input type="text" required name="phone" placeholder="Enter Phone" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Enter Club's Address : </label>
                                        <input type="text" required name="address" placeholder="Enter address" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    <div class=" mb-4 px-3">
                                        <label for="" class="text-[14px] font-light text-gray-600">Choose Club's Photo : </label>
                                        <input type="file"  name="photo" placeholder="Choose Photo" class="w-full  py-1.5 px-6 bg-white outline-none border border-gray-300 rounded ">
                                    </div>
                                    
                                    
                                    <div class=" mb-4 px-3">
                                        <button type="submit" name="addathletes" class="text-white bg-blue-400 hover:bg-blue-600 uppercase py-2 rounded font-[500] w-full">Add Club</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </section>

                <!-- end add user -->
                <div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
                    <div class="container w-full  mx-auto xl:px-2">

                    <div id='recipients' class="p-2 xl:p-8 mt-6 lg:mt-0 rounded overflow-x-scroll shadow bg-white">
                    <div class="flex justify-center items-center py-5">
                        <input class="form-control border-end-0 border w-4/5 xl:w-2/5 py-3 px-10 rounded-xl outline-none " type="search" id="searchInput" class="form-control" placeholder="Search by here .....">
                    </div>
                <table id="datatable" class="table datatable stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                        <thead class="text-left px-5">
                            <tr class="bg-gray-100">
                                <th class="py-2 px-5 border" data-priority="1">#</th>
                                <th class="py-2 px-5 border" data-priority="2">Club Name</th>
                                <th class="py-2 px-5 border" data-priority="3">Master</th>
                                <th class="py-2 px-5 border" data-priority="3">Phone</th>
                                <th class="py-2 px-5 border" data-priority="3">Address</th>
                                <th class="py-2 px-5 border" data-priority="5">Created At</th>
                                <th class="py-2 px-5 border" data-priority="6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="font-light">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $all =  $db->getAll("clubs");
                                foreach ($all as $user) { ?>
                                   
                            <?php }
                            } ?>


                        </tbody>


                    </table>
                    <div class="msg w-full hidden flex justify-center items-center ">
                        <span class="text-center ">No records found</span>
                    </div>
                    <!-- paginnation with rows -->

                    <div class="pagination flex justify-between py-5">
                        <span></span>
                        <div class="flex gap-1">
                            <button id="prevBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer">&lt;</button>
                            <span id="pageInfo" class="hidden p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
                            <span id="pageList" class="p-[3px] rounded text-lg flex gap-2 cursor-pointer">1</span>
                            <button id="nextBtn" class="bg-gray-200 border font-bold rounded px-2 cursor-pointer ">&gt;</button>
                        </div>

                    </div>
                   
                    <script>
                                   
                        const table = document.getElementById('datatable');
                        const tbody = table.querySelector('tbody');
                        const prevBtn = document.getElementById('prevBtn');
                        const nextBtn = document.getElementById('nextBtn');
                        const pageInfo = document.getElementById('pageInfo');
                        const pageList = document.getElementById('pageList');
                        const rowsPerPage = 10;
                        let currentPage = 1;
                        let filteredData = <?php echo json_encode($all); ?>;

                        const data = <?php echo json_encode($all); ?>;

                        function filterTable(query) {
                            if (query === '') {
                                filteredData = data;
                            } else {
                                filteredData = data.filter(item => {
                                    return (
                                        item.name.toLowerCase().includes(query) ||
                                        item.master.toLowerCase().includes(query) ||
                                        item.phone.toLowerCase().includes(query) ||
                                        item.address.toLowerCase().includes(query) ||
                                        item.createdat.toLowerCase().includes(query)
                                    );
                                });
                            }

                            currentPage = 1;
                            renderTableRows(currentPage);
                            updatePageInfo();
                            renderPageList();
                        }

                        function renderTableRows(page) {
                            const start = (page - 1) * rowsPerPage;
                            const end = start + rowsPerPage;
                            tbody.innerHTML = '';

                            for (let i = start; i < end && i < filteredData.length; i++) {
                                           const row = document.createElement('tr');
                                           row.className = 'table-row';
                                           row.innerHTML = `
                                           <td class="px-5 py-1 border-b"><img src="${filteredData[i].photo}" class="w-10 h-10 rounded-full object-cover"></td>
                                           <td class="px-5 py-1 border-b">${filteredData[i].name}</td>
                                           <td class="px-5 py-1 border-b">${filteredData[i].master}</td>
                                           <td class="px-5 py-1 border-b">${filteredData[i].phone}</td>
                                           <td class="px-5 py-1 border-b">${filteredData[i].address}</td>
                                           <td class="px-5 py-1 border-b">${filteredData[i].createdat}</td>
                                           <td class="px-5 py-1 border-b">
                                               <div class="flex gap-10">
                                                   <a href="updateclub?editid=${filteredData[i].id}" class="text-red-700"><img src="../../assets/icons/icons8-edit-property-18.png"></a>
                                                   <a onclick="return openConfirm()" href="clubs?id=${filteredData[i].id}" class="text-red-700"><img src="../../assets/icons/icons8-delete-18.png"></a>
                                               </div>
                                           </td>
                                       `;
                                           tbody.appendChild(row);
                                       }
                        }
                            function updatePageInfo() {
                                pageInfo.textContent = `${currentPage}`;
                            }

                            function renderPageList() {
                                pageList.innerHTML = '';
                                const totalPages = Math.ceil(filteredData.length / rowsPerPage);

                                const maxDisplayedPages = 10;
                                const lastPage = totalPages;

                                let startPage = Math.max(1, currentPage - Math.floor(maxDisplayedPages / 2));
                                let endPage = Math.min(lastPage, startPage + maxDisplayedPages - 1);

                                if (endPage - startPage < maxDisplayedPages - 1) {
                                    startPage = Math.max(1, endPage - maxDisplayedPages + 1);
                                }

                                for (let i = startPage; i <= endPage; i++) {
                                    const pageItem = document.createElement('span');
                                    pageItem.textContent = i;

                                    if (i === currentPage) {
                                        pageItem.classList.add('current-page'); 
                                    }

                                    pageItem.addEventListener('click', () => {
                                        currentPage = i;
                                        renderTableRows(currentPage);
                                        updatePageInfo();
                                        renderPageList();
                                    });

                                    pageList.appendChild(pageItem);
                                }

                                if (totalPages > maxDisplayedPages) {
                                    const lastPageItem = document.createElement('span');
                                    lastPageItem.textContent = '... ' + totalPages;
                                    lastPageItem.addEventListener('click', () => {
                                        currentPage = lastPage;
                                        renderTableRows(currentPage);
                                        updatePageInfo();
                                        renderPageList();
                                    });
                                    pageList.appendChild(lastPageItem);
                                }
                            }


                            prevBtn.addEventListener('click', () => {
                                if (currentPage > 1) {
                                    currentPage--;
                                    renderTableRows(currentPage);
                                    updatePageInfo();
                                    renderPageList();
                                }
                            });

                            nextBtn.addEventListener('click', () => {
                                const totalPages = Math.ceil(filteredData.length / rowsPerPage);
                                if (currentPage < totalPages) {
                                    currentPage++;
                                    renderTableRows(currentPage);
                                    updatePageInfo();
                                    renderPageList();
                                }
                            });

                            const searchInput = document.getElementById('searchInput');
                            searchInput.addEventListener('input', function () {
                                const input = this.value.trim().toLowerCase();
                                filterTable(input);
                            });

                            window.onload = () => {
                                renderTableRows(1)
                                renderPageList();
                            };
                   </script>

		           </div>
	            </div>
                 <!-- delete row -->
                 <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id = $_GET['id'];
                        $userdel = $db->destroy('clubs', 'inactive', $id);

                        if ($userdel) {
                            echo "<script>alert('Record deleted successfully'); window.location.href = 'clubs';</script>";
                        } else {
                            echo "<script>alert('Failed to delete record'); window.location.href = 'clubs';</script>";
                        }
                    }
                    ?>

                    <script>
                        function openConfirm() {
                            return confirm("Are you sure you want to Delete this Club?");
                        }
                    </script> 


		</div>
	</div>

</div>
</div>
</main>

	<script>

		const openModalBtn = document.getElementById('openModalBtn');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const modal = document.getElementById('overlay');

            function openModal() {
                modal.style.display = 'block';
            }

            function closeModal() {
                modal.style.display = 'none';
            }

            openModalBtn.addEventListener('click', openModal);
            closeModalBtn.addEventListener('click', closeModal);


	</script>
