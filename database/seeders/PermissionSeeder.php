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

            Permission::create(['name'=>'records.show'])->syncRoles('Admin', 'Librarian', 'Customer');

            Permission::create(['name'=>'copies.index'])->syncRoles('Admin', 'Librarian', 'Customer');
            Permission::create(['name'=>'copies.show'])->syncRoles('Admin', 'Librarian', 'Customer');

            Permission::create(['name'=>'users.index'])->syncRoles('Admin', 'Librarian');
            Permission::create(['name'=>'users.show'])->syncRoles('Admin', 'Librarian');

            Permission::create(['name'=>'records.index'])->syncRoles('Admin', 'Librarian');

            //Admin permissions
            Permission::create(['name'=>'books.store'])->syncRoles('Admin');
            Permission::create(['name'=>'books.update'])->syncRoles('Admin');
            Permission::create(['name'=>'books.destroy'])->syncRoles('Admin');
            
            Permission::create(['name'=>'author.update'])->syncRoles('Admin');
            Permission::create(['name'=>'author.store'])->syncRoles('Admin');
            Permission::create(['name'=>'author.destroy'])->syncRoles('Admin');

            Permission::create(['name'=>'copy.store'])->syncRoles('Admin');
            Permission::create(['name'=>'copy.update'])->syncRoles('Admin');
            Permission::create(['name'=>'copy.destroy'])->syncRoles('Admin');

            Permission::create(['name'=>'record.store'])->syncRoles('Admin');
            Permission::create(['name'=>'record.update'])->syncRoles('Admin');
            Permission::create(['name'=>'record.destroy'])->syncRoles('Admin');

            Permission::create(['name'=>'bookphotos.store'])->syncRoles('Admin');
            Permission::create(['name'=>'bookphotos.update'])->syncRoles('Admin');
            Permission::create(['name'=>'bookphotos.destroy'])->syncRoles('Admin');          
      }
}
