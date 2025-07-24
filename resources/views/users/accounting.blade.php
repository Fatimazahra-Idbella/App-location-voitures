@extends('layouts.body')

@section('Title')
    Accounting
@endsection

@section('accounting_active')
    active bg-gradient-primary 
@endsection

@section('page_name')
    Accounting
@endsection

@section('head')
<style>
    .accounting-container {
        padding: 2rem;
    }

    .accounting-card {
       
         border-radius: 12px;
        box-shadow: 0 4px 12px rgba(105, 34, 34, 0.08);
        padding: 2rem;
        margin-bottom: 2rem;
        transition: transform 0.3s ease;
    }

    .accounting-card:hover {
        transform: translateY(-5px);
    }

    .accounting-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        
    }
    .accounting-title h4 {
        margin: 0;
        font-weight: 700;
        color: var(--text-primary, #1f2937);
    }

    .accounting-table thead 
       {
    }

    .accounting-table th {
        text-align: center;
        vertical-align: middle;
        padding: 1rem;
        color: #374151;
    }
    .accounting-table td {
        text-align: center;
        vertical-align: middle;
        padding: 1rem;
    }

    .badge-paid {
        background-color: #10b981;
        color: white;
        border-radius: 50px;
        padding: 0.4rem 1rem;
        font-size: 0.75rem;
    }

    .badge-pending {
        background-color: #fbbf24;
        color: white;
        border-radius: 50px;
        padding: 0.4rem 1rem;
        font-size: 0.75rem;
    }

    .badge-overdue {
        background-color: #ef4444;
        color: white;
        border-radius: 50px;
        padding: 0.4rem 1rem;
        font-size: 0.75rem;
    }

    /* Responsive fix */
    @media (max-width: 768px) {
        .accounting-card {
            padding: 1rem;
        }
        .accounting-title {
            font-size: 1.25rem;
        }
    }

    /* Dark mode support */
    [data-theme="dark"] .accounting-card {
        background: #1e293b;
        color: #f1f5f9;
    }

    [data-theme="dark"] .accounting-table thead {
        background: #334155;
    }

    [data-theme="dark"] .accounting-table td {
        color: #cbd5e1;
    }
</style>
@endsection

@section('main_content')
<div class="container accounting-container">
    <div class="accounting-card">
        <div class="accounting-title">
           <h4> Accounting Summary</h4>
        </div>
        <div class="table-responsive">
            <table class="table accounting-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vehicle</th>
                        <th>Contract Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemple de données statiques -->
                    <tr>
                        <td>1</td>
                        <td>BMW X5 - 2023</td>
                        <td>2025-07-12</td>
                        <td>$450.00</td>
                        <td><span class="badge-paid">Paid</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">Download</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Audi A4 - 2022</td>
                        <td>2025-06-20</td>
                        <td>$320.00</td>
                        <td><span class="badge-pending">Pending</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-secondary">Download</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mercedes C-Class - 2021</td>
                        <td>2025-05-05</td>
                        <td>$600.00</td>
                        <td><span class="badge-overdue">Overdue</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-danger">Download</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
