<!DOCTYPE html>
<html>
<head>
    <title>Ticket Confirmation</title>
</head>
<body>
    <h2>Ticket Confirmation</h2>

    <p>Dear <?php echo e($ticket->user->name); ?>,</p>

    <p>Thank you for completing your order at <span><a href="https://gatheringinbali.com">gatheringinbali.com</a></span>, Your ticket has been successfully confirmed. Here are the details:</p>

    <table>
        <tr>
            <th>Ticket UUID:</th>
            <td><?php echo e($ticket->ticket_uuid); ?></td>
        </tr>
        <tr>
            <th>Program:</th>
            <td><?php echo e($ticket->program->name); ?></td>
        </tr>
        <!-- Add any other ticket details you want to include -->
    </table>

    <p>Thank you for your purchase. If you have any further questions or need assistance, please feel free to contact us.</p>

    <p>Best regards,</p>
    <p>Gathering In Bali</p>
</body>
</html>
<?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/modules/mail/ticket.blade.php ENDPATH**/ ?>