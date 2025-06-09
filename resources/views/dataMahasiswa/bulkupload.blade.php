@extends('layouts.app')

@section('title', 'Bulk Upload')

@section('contents')

<div class="d-flex justify-content-center mt-4">
    <div style="width: 1920px;">
        <!-- <h4 class="mb-3">Bulk upload</h4> -->

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2 align-items-center">
                        <div class="col-md-10">
                            <input type="file" name="bulk_file" accept=".csv, .xls, .xlsx" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection