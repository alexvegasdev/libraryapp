<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
      /**
       * Run the database seeds.
       */
      public function run(): void
      {
            Permission::create(['name'=>'books.index'])->syncRoles('Admin', 'Librarian', 'Customer');
            Permission::create(['name'=>'books.show'])->syncRoles('Admin', 'Librarian', 'Customer');

            Permission::create(['name'=>'authors.index'])->syncRoles('Admin', 'Librarian', 'Customer');
            Permission::create(['name'=>'authors.show'])->syncRoles('Admin', 'Librarian', 'Customer');

            Permission::create(['name'=>'genres.index'])->syncRoles('Admin', 'Librarian', 'Customer');
            Permission::create(['name'=>'genres.show'])->syncRoles('Admin', 'Librarian', 'Customer');

            //Permission::create(['name'=>'bookphotos.index'])->syncRoles('Admin', 'Librarian', 'Customer');

            //Permission::create(['name'=>'bookphotos.show'])->syncRoles('Admin', 'Librarian');   

            Permission::create(['name'=>'copies.index'])->syncRoles('Admin', 'Librarian');
            Permission::create(['name'=>'copies.show'])->syncRoles('Admin', 'Librarian');

            Permission::create(['name'=>'users.index'])->syncRoles('Admin', 'Librarian');
            Permission::create(['name'=>'users.show'])->syncRoles('Admin', 'Librarian');

            Permission::create(['name'=>'loans.index'])->syncRoles('Admin', 'Librarian');
            Permission::create(['name'=>'loans.show'])->syncRoles('Admin', 'Librarian');


            //Admin permissions

            Permission::create(['name'=>'users.update'])->syncRoles('Admin', 'Librarian');
            Permission::create(['name'=>'users.store'])->syncRoles('Admin', 'Librarian');
            Permission::create(['name'=>'users.destroy'])->syncRoles('Admin', 'Librarian');

            Permission::create(['name'=>'books.store'])->syncRoles('Admin');
            Permission::create(['name'=>'books.update'])->syncRoles('Admin');
            Permission::create(['name'=>'books.destroy'])->syncRoles('Admin');
            
            Permission::create(['name'=>'authors.update'])->syncRoles('Admin');
            Permission::create(['name'=>'authors.store'])->syncRoles('Admin');
            Permission::create(['name'=>'authors.destroy'])->syncRoles('Admin');

            Permission::create(['name'=>'copies.store'])->syncRoles('Admin');
            Permission::create(['name'=>'copies.update'])->syncRoles('Admin');
            Permission::create(['name'=>'copies.destroy'])->syncRoles('Admin');

            Permission::create(['name'=>'copystatuses.index'])->syncRoles('Admin');
            Permission::create(['name'=>'copystatuses.show'])->syncRoles('Admin');
            Permission::create(['name'=>'copystatuses.store'])->syncRoles('Admin');
            Permission::create(['name'=>'copystatuses.update'])->syncRoles('Admin');
            Permission::create(['name'=>'copystatuses.destroy'])->syncRoles('Admin');

            Permission::create(['name'=>'loans.store'])->syncRoles('Admin');
            Permission::create(['name'=>'loans.update'])->syncRoles('Admin');
            Permission::create(['name'=>'loans.destroy'])->syncRoles('Admin');

            Permission::create(['name'=>'loanstatuses.index'])->syncRoles('Admin');
            Permission::create(['name'=>'loanstatuses.show'])->syncRoles('Admin');
            Permission::create(['name'=>'loanstatuses.store'])->syncRoles('Admin');
            Permission::create(['name'=>'loanstatuses.update'])->syncRoles('Admin');
            Permission::create(['name'=>'loanstatuses.destroy'])->syncRoles('Admin');

            // Permission::create(['name'=>'bookphotos.store'])->syncRoles('Admin');
            // Permission::create(['name'=>'bookphotos.update'])->syncRoles('Admin');
            // Permission::create(['name'=>'bookphotos.destroy'])->syncRoles('Admin');          
      }
}
