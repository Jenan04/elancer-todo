class WorkspaceInvitationService 
{
    public function sendInvite($workspaceId, $email, $role) 
    {
        // 1. Get the currently authenticated user.
        $user = $request->user()
        
        // 2. Query the pivot table to check if this authenticated user has the 'Admin' role in $workspaceId.
        <!-- if($user()->role('admain')&&$user()->workspaceId()){
            return existing;
        } -->
           <!-- $isAdmin = $user->workspaces()
            ->where('workspace_id', $workspaceId)
            ->where('role', 'admin')
            ->findOrFail()  -->

           $isAdmin = abort_unless(
    $user->workspaces()->where('workspace_id', $workspaceId)->where('role', 'admin')->exists(),
    403, 
    'Only workspace admins can invite new members.'
);  

        // 3. IF they are not an Admin -> Throw a 403 Unauthorized Exception.
        
        // 4. Query the workspace_user table to see if the target $email is ALREADY a member of this workspace.
        // 5. IF they are already a member -> Throw a Validation Exception ("User is already in this workspace").
        <!-- $isMember = $user->workspace_user()->where('user_id',$userId)->where('email', $email)->show('User is already in this workspace') -->

        $isMember = DB::table('workspace_user')
          ->join('users', 'users.id', '=', 'workspace_user.user_id')
          ->where('workspace_user.workspace_id', $workspaceId)
          ->where('users.email', $email)
          ->exists();

          abort-if($isMember, 422, 'User is already a member of this workspace.')

        // 6. Query the invitations table to see if an invitation with this $email and $workspaceId already exists with a 'PENDING' status.
        // 7. IF a pending invitation exists -> Trigger the mailer system to resend the existing invitation email, then RETURN early.
        $pendingInvitation = DB::table('invitations')
          ->where('email', $email)
          <!-- ->where('invitations.workspace_id', $workspaceId) -->
           ->where('status', 'pending')
          <!-- ->exists() -->
           first();

        if ($pendingInvitation) {
            return response()->json(['message' => 'Invitation resent successfully.']); 
        }  

        // 8. IF no pending invitation exists -> Generate a secure unique token (e.g., UUID or random string).
        $token = Str::uuid()
        // 9. Insert a new record into the 'invitations' table with: workspace_id, email, role, token, and status = 'PENDING'.
        
        
        // 10. Trigger the notification system/mailer to send the invitation link containing the secure token to the user's email.
        
        // 11. Return a success response to the controller.
    }
}