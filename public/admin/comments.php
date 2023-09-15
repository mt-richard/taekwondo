
<?php include '../../includes/header.php'; ?>
<div class="md:flex">
    <div>
        <?php include '../../includes/leftbar.php'; ?>
    </div>
    <main class="w-full p-1 md:px-20 bg-gray-100 ">
        <h2 class="text-xl  py-3 md:py-10">Dashbord / Comments</h2>
        <div class="text-gray-900 tracking-wider leading-normal">
            <div class="container w-full mx-auto md:px-2">


                <div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
                    <div class="container w-full  mx-auto md:px-2">

                    <div id='recipients' class="md:p-8 mt-6 lg:mt-0 rounded shadow overflow-x-scroll bg-white">
                    <div class="flex justify-center items-center py-5">
                        <input class="form-control border-end-0 border w-4/5 md:w-2/5 py-3 px-10 rounded-xl outline-none " type="search" id="searchInput" class="form-control" placeholder="Search by here .....">
                    </div>

                    <table id="datatable" class="table datatable stripe hover overflow-y-scroll" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                        <thead class="text-left px-5">
                            <tr class="bg-gray-100">
                                <th class="py-2 px-5 border" data-priority="1">Name</th>
                                <th class="py-2 px-5 border" data-priority="2">Email</th>
                                <th class="py-2 px-5 border" data-priority="3">Message</th>
                                <th class="py-2 px-5 border" data-priority="3">Status</th>
                                <th class="py-2 px-5 border" data-priority="5">Created At</th>
                                <th class="py-2 px-5 border" data-priority="6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="font-light">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $all =  $db->getAllComments("comments");

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
                                        item.username.toLowerCase().includes(query) ||
                                        item.email.toLowerCase().includes(query) ||
                                        item.phone.includes(query) ||
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
                                <td class="px-5 py-1 border-b">${filteredData[i].name}</td>
                                <td class="px-5 py-1 border-b">${filteredData[i].email}</td>
                                <td class="px-5 py-1 border-b">${filteredData[i].message}</td>
                                <td class="px-5 py-1 border-b">${filteredData[i].status}</td>
                                <td class="px-5 py-1 border-b">${filteredData[i].createdat}</td>
                                <td class="px-1 md:px-5 py-1 border-b">
                                    <div class="flex gap-2 md:gap-10">
                                        <a href="comments?approveid=${filteredData[i].id}" class=" font-semibold text-green-600 text-[12px]">Approve</a>
                                        <a onclick="return openConfirm()" href="comments?id=${filteredData[i].id}" class="text-red-700"><img src="../../assets/icons/icons8-delete-18.png"></a>
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
                        $userid = $_GET['id'];
                        $status = "inactive";
                        $userdel = $db->destroy('comments', $status, $userid);

                        if ($userdel) {
                            echo "<script>alert('Record deleted successfully'); window.location.href = 'comments';</script>";
                        } else {
                            echo "<script>alert('Failed to delete record'); window.location.href = 'comments';</script>";
                        }
                    }
                    ?>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['approveid']) && is_numeric($_GET['approveid'])) {
                        $commentid = $_GET['approveid'];
                        $status = "active";
                        $comdel = $db->destroy('comments', $status, $commentid);

                        if ($comdel) {
                            echo "<script>alert('Record Update successfully'); window.location.href = 'comments';</script>";
                        } else {
                            echo "<script>alert('Failed to update record'); window.location.href = 'comments';</script>";
                        }
                    }
                    ?>

                    <script>
                        function openConfirm() {
                            return confirm("Are you sure you want to Delete this comments?");
                        }
                    </script>



	

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