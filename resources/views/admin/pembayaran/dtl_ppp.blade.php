@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <section id="tabs" class="card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
        </div>
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Lunas</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Belum Lunas</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="card-body tab-pane fade show active" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <table id="example1" class="table table-bordered table-striped" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Rayon</th>
                                <th>Nama Tagihan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Work 1</a></td>
                                <td>Doe</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td><a href="#">Work 2</a></td>
                                <td>Moe</td>
                                <td>Moe</td>
                                <td>mary@example.com</td>
                            </tr>
                            <tr>
                                <td><a href="#">Work 3</a></td>
                                <td>Dooley</td>
                                <td>Dooley</td>
                                <td>july@example.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table id="example3" class="table table-bordered table-striped" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Rayon</th>
                                <th>Nama Tagihan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Work 1</a></td>
                                <td>Doe</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td><a href="#">Work 2</a></td>
                                <td>Moe</td>
                                <td>Moe</td>
                                <td>mary@example.com</td>
                            </tr>
                            <tr>
                                <td><a href="#">Work 3</a></td>
                                <td>Dooley</td>
                                <td>Dooley</td>
                                <td>july@example.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('footer')
<style>
.project-tab {
    padding: 10%;
    margin-top: -8%;
}

.project-tab #tabs {
    background: #007b5e;
    color: #eee;
}

.project-tab #tabs h6.section-title {
    color: #eee;
}

.project-tab #tabs .nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}

.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}

.project-tab .nav-link:hover {
    border: none;
}

.project-tab thead {
    background: #f3f3f3;
    color: #333;
}

.project-tab a {
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>
@stop