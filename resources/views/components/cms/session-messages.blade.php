{{--
    Session flash messages for 'error', 'message', and 'success'.
--}}
<div class="my-8">
    <x-cms.session-message type="message" class="text-secondary-600 border-secondary-800"/>
    <x-cms.session-message type="success" class="text-green-600 border-green-800"/>
    <x-cms.session-message type="error" class="text-red-600 border-red-800" timeout="10000"/>
</div>
