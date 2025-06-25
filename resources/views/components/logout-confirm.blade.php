<div id="logoutModal" class="modal">
    <div class="modal-content">
        <h3>Confirm Logout</h3>
        <p>Are you sure you want to log out?</p>
        <div class="modal-buttons">
            <button onclick="closeLogoutModal()" class="cancel-btn">Cancel</button>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="confirm-btn">Logout</button>
            </form>
        </div>
    </div>
</div>
