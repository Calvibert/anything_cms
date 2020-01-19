<?php if ($error) {
echo json_encode(['message' => 'error']);
} else {
echo json_encode(['message' => 'success', 'user' => $user]);
}
