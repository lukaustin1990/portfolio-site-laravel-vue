export default function TimeLineCard({ children, direction = "left" }) {
    return (
        <li className={`timeline-item ${direction}`}>
            <div className="timeline-body">
                <div className="timeline-content timeline-indicator">
                <div className="card border-0 shadow">
                  <div className="card-body p-xl-4">
                    {children}
                  </div>
                </div>
              </div>
            </div>
          </li>
    )
}