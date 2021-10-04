<!-- Begin Page Content -->
<?php
foreach ($gender as $key => $value) {
    $gender_label[] = $value['gender'];
    $gender_count[] = $value['jumlah'];
}

foreach ($nationality as $key => $value) {
    $nationality_label[] = $value['nationality'];
    $nationality_total[] = $value['total'];
}

foreach ($subtheme as $key => $value) {
    $subtheme_label[] = $value['subtheme'];
    $subtheme_total[] = $value['total'];
}

foreach ($age as $key => $value) {
    $age_label[] = $value['age'];
    $age_total[] = $value['total'];
}

foreach ($register_per_day as $key => $value) {
    $register_date_label[] = date("F d", strtotime($value['created_date']));
    $register_date_total[] = $value['total'];
}

$color_count = 0;
if (
    count($gender_label) >= count($nationality_label)
    && count($gender_label) >= count($subtheme_label)
    && count($gender_label) >= count($age_label)
) {
    $color_count = count($gender_label);
} else if (
    count($nationality_label) >= count($gender_label)
    && count($nationality_label) >= count($subtheme_label)
    && count($nationality_label) >= count($age_label)
) {
    $color_count = count($nationality_label);
} else if (
    count($subtheme_label) >= count($gender_label)
    && count($subtheme_label) >= count($nationality_label)
    && count($subtheme_label) >= count($age_label)
) {
    $color_count = count($subtheme_label);
} else if (
    count($age_label) >= count($gender_label)
    && count($age_label) >= count($nationality_label)
    && count($age_label) >= count($subtheme_label)
) {
    $color_count = count($age_label);
}

$colors = [];

for ($i = 0; $i < $color_count; $i++) {
    $random = mt_rand(0, 16777215);
    $color = "#" . dechex($random);
    $colors[$i] = $color;
}

?>
<div class="container-fluid">

    <div class="row">

        <!-- Total Partipant  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Registered Participants</div><!-- Peserta  yang udah bayar uang pendaftaran-->
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $participant_total ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Participant Fix-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Valid Participants</div> <!-- Participant yang bakalan ikut karna udah bayar bacth 1 dan 2-->
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $valid_participant_total ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bell fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Fixed Participants
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $fixed_participant_total ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pending_payment_total ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- 
        Bar Chart -->


        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Participant Genders</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="gender"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Participant Nationalities</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="nationality"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Participant Chosen Subthemes</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="subtheme"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registered Participants Total per Day</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="register_per_day"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Participant Ages</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="age"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/js/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script>
<script src="assets/js/demo/chart-bar-demo.js"></script>

<!-- gender chart -->
<script>
    var ctx = document.getElementById('gender').getContext('2d')

    const data = {
        labels: <?php echo json_encode($gender_label); ?>,
        datasets: [{
            label: 'Participant Genders',
            data: <?php echo json_encode($gender_count); ?>,
            backgroundColor: [<?php foreach ($colors as $c) {
                                    echo ('"' . $c . '",');
                                } ?>],
            hoverOffset: 4
        }]
    }

    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: 'rgb(255,255,255)',
                bodyFontColor: '#858796',
                borderColor: '#dddfeb',
                borderWidth: 2,
                displayColors: false
            }
        }
    })
</script>

<!-- nationality chart -->
<script>
    var ctx1 = document.getElementById('nationality').getContext('2d')

    const data1 = {
        labels: <?php echo json_encode($nationality_label); ?>,
        datasets: [{
            label: 'Participant Nationalities',
            data: <?php echo json_encode($nationality_total); ?>,
            backgroundColor: [<?php foreach ($colors as $c) {
                                    echo ('"' . $c . '",');
                                } ?>],
            hoverOffset: 4
        }]
    }

    var myPieChart1 = new Chart(ctx1, {
        type: 'pie',
        data: data1,
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: 'rgb(255,255,255)',
                bodyFontColor: '#858796',
                borderColor: '#dddfeb',
                borderWidth: 2,
                displayColors: true
            }
        }
    })
</script>

<!-- chosen subtheme chart -->
<script>
    var ctx2 = document.getElementById('subtheme').getContext('2d')

    const data2 = {
        labels: <?php echo json_encode($subtheme_label); ?>,
        datasets: [{
            label: 'Participant Chosen Subthemes',
            data: <?php echo json_encode($subtheme_total); ?>,
            backgroundColor: [<?php foreach ($colors as $c) {
                                    echo ('"' . $c . '",');
                                } ?>],
            hoverOffset: 4
        }]
    }

    var myPieChart2 = new Chart(ctx2, {
        type: 'pie',
        data: data2,
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: 'rgb(255,255,255)',
                bodyFontColor: '#858796',
                borderColor: '#dddfeb',
                borderWidth: 2,
                displayColors: true
            }
        }
    })
</script>

<!-- age chart -->
<script>
    var ctx3 = document.getElementById('age').getContext('2d')

    const data3 = {
        labels: <?php echo json_encode($age_label); ?>,
        datasets: [{
            label: 'Participant Ages',
            data: <?php echo json_encode($age_total); ?>,
            backgroundColor: [<?php foreach ($colors as $c) {
                                    echo ('"' . $c . '",');
                                } ?>],
            hoverOffset: 4
        }]
    }

    var myPieChart3 = new Chart(ctx3, {
        type: 'pie',
        data: data3,
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: 'rgb(255,255,255)',
                bodyFontColor: '#858796',
                borderColor: '#dddfeb',
                borderWidth: 2,
                displayColors: true
            }
        }
    })
</script>

<!-- register per day chart -->
<script>
    var ctx4 = document.getElementById('register_per_day').getContext('2d')

    const data4 = {
        labels: <?php echo json_encode($register_date_label); ?>,
        datasets: [{
            label: 'Registered Participants',
            data: <?php echo json_encode($register_date_total); ?>,
            fill: false,
            borderColor: [<?php echo ('"' . $colors[0] . '",'); ?>],
            tension: 0.2
        }]
    }

    var myPieChart4 = new Chart(ctx4, {
        type: 'line',
        data: data4,
    })
</script>