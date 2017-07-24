<?php
namespace App\Policies;

use App\User;

trait Authorization
{
	
	public function before(User $user) {
        if($user->isSuperAdmin()) {
            return true;
        } 
    }
    
    /**
     * Determine whether the user can view the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function view(User $user)
    {
         return true; 
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->checkRole($user);
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->checkRole($user);
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->checkRole($user);
    }

    protected function checkRole(User $user) {
        return  ($user->isAdmin() || $user->isManager() || $user->isStaff());
    }
}