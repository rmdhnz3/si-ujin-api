<?php

namespace App\Console\Commands;

use Exception;
use Throwable;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Command\Command as CommandAlias;

class CreateSiswa extends Command
{
    protected $signature = 'siswa:create';

    protected $description = 'Create a Siswa';

    /**
     * @throws Throwable
     */
    public function handle(): int
    {
        name:
        $name = $this->ask('What is the name of the Siswa ?');
        if (empty($name)) {
            $this->error('Name is required');
            goto name;
        }

        email:
        $email = $this->ask('What is the email of the Siswa ?');
        if (empty($email)) {
            $this->error('Email is required');
            goto email;
        } 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Email is invalid');
            goto email;
        }

        password:
        $password = $this->secret('What is the password of the siswa?');
        if (empty($password)) {
            $this->error('Password is required');
            goto password;
        }
        if (strlen($password) < 8) {
            $this->error('Password is too short. It must be at least 8 characters');
            goto password;
        }

        $this->info('Creating a admin user with the following credentials:');
        $this->info("Name: $name");
        $this->info("Email: $email");

        if ($this->confirm('Do you wish to create the user?')) {
            $this->info('Creating the user...');
            DB::beginTransaction();
            try {
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);
                $user->assignRole(RoleEnum::SISWA->value);
                DB::commit();
                $this->info('Siswa  created successfully.');

                return CommandAlias::SUCCESS;   
            } catch (Exception $e) {
                DB::rollBack();
                $this->error('Could not create the Siswa.');
                $this->error($e->getMessage());

                return CommandAlias::FAILURE;
            }
        } else {
            $this->error('Command Cancelled!');

            return CommandAlias::INVALID;
        }
    }
}