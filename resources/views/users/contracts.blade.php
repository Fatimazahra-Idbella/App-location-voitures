@extends('layouts.body')

@section('Title')
    Contracts
@endsection

@section('contracts_active')
    active bg-gradient-primary 
@endsection

@section('page_name')
    Contracts
@endsection

@section('head')
<style>
    .contracts-section {
        padding: 3rem 2rem;
       
        min-height: 85vh;
    }

    .contracts-card {
       
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(105, 34, 34, 0.08);
        padding: 2rem;
        margin-bottom: 2rem;
        transition: transform 0.3s ease;
    }

    .contracts-card:hover {
        transform: translateY(-5px);
    }

    .contract-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .contract-header h4 {
        margin: 0;
        font-weight: 700;
        color: var(--text-primary, #1f2937);
    }

    .contract-table th,
    .contract-table td {
        text-align: center;
        vertical-align: middle;
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .contract-table th {
       
        color: #374151;
        font-size: 0.9rem;
        text-transform: uppercase;
    }

    .contract-status {
        padding: 0.5rem 1rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 600;
        color: white;
    }

    .status-active {
        background-color: #10b981;
    }

    .status-expired {
        background-color: #ef4444;
    }

    .status-pending {
        background-color: #f59e0b;
    }
</style>
@endsection

@section('main_content')
<div class="contracts-section container-fluid">
    <div class="contracts-card">
        <div class="contract-header">
            <h4>Rental Contracts</h4>
            <a href="#" class="btn btn-primary">New Contract</a>
        </div>

        <div class="table-responsive">
            <table class="table contract-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vehicle</th>
                        <th>Contract Start</th>
                        <th>Contract End</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>BMW X5</td>
                        <td>2025-07-10</td>
                        <td>2025-07-20</td>
                        <td><span class="contract-status status-active">Active</span></td>
                        <td>$650.00</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">View</a>
                            <a href="#" class="btn btn-sm btn-secondary">Download</a>
                        </td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Audi A4</td>
                        <td>2025-06-01</td>
                        <td>2025-06-15</td>
                        <td><span class="contract-status status-expired">Expired</span></td>
                        <td>$450.00</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">View</a>
                            <a href="#" class="btn btn-sm btn-secondary">Download</a>
                        </td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Mercedes C200</td>
                        <td>2025-07-25</td>
                        <td>2025-08-05</td>
                        <td><span class="contract-status status-pending">Pending</span></td>
                        <td>$720.00</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">View</a>
                            <a href="#" class="btn btn-sm btn-secondary">Download</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

