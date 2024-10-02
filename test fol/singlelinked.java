public class singlelinked {
    Node head = null;

    public addFront(int data){
            System.out.println("Add a node"+data+"at the beginning");
            Node newNode = new Node(data);
            if(head == null){
                head = newNode;
            }else{
                newNode.next = head;
                head = newNode;
            }
            return newNode;
    }
}